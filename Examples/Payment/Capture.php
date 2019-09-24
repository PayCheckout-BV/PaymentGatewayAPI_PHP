<?php

echo "Starting<br/>";

include "..\..\src\PaymentGateway\autoloader.php";

$execute = new \PaymentGateway\Executor("12345","DE6DA27F-ACFC-463B-91F7-F852FEAC256B","https://secure-dev.paycheckout.com");

// ----------------------------------
// Create a payment with status PAID
// ----------------------------------

// Prepare order
$order = new \PaymentGateway\Model\Order\Order();
$order->setOrderNumber("2019-03-18/1001");
$order->setBillingIdentity(new \PaymentGateway\Model\Identity());
$order->setBillingAddress(new \PaymentGateway\Model\Address());
$order->setShippingAddress(new \PaymentGateway\Model\Address());

// Prepare identity
$order->getBillingIdentity()->setEmailAddress("martien.Doe@example.com");
$order->getBillingIdentity()->setGender(\PaymentGateway\Model\Gender::Male);

// Prepare addresses
$order->getBillingAddress()->setTitle("Mr.");
$order->getBillingAddress()->setFirstName("John");
$order->getBillingAddress()->setMiddleName("Van");
$order->getBillingAddress()->setLastName("Dijk");
$order->getBillingAddress()->setOrganisation("Sample Business Ltd");
$order->getBillingAddress()->setAddressLine1("Business Centre Road");
$order->getBillingAddress()->setAddressLine2("Unit 7");
$order->getBillingAddress()->setZIPCode("XX12 1XX");
$order->getBillingAddress()->setCity("TestCity");
$order->getBillingAddress()->setPhoneNumber1("+44 9999 123456");
$order->getBillingAddress()->setPhoneNumber1Type(\PaymentGateway\Model\PhoneNumberType::Fixed);
$order->getBillingAddress()->setPhoneNumber2("+44 8888 123456");
$order->getBillingAddress()->setPhoneNumber2Type(\PaymentGateway\Model\PhoneNumberType::Unknown);
$order->getBillingAddress()->setCountryISO3166Alpha2("GB");

// Prepare addresses
$order->getShippingAddress()->setTitle("Mr.");
$order->getShippingAddress()->setFirstName("Martien");
$order->getShippingAddress()->setLastName("Doe");
$order->getShippingAddress()->setOrganisation("TestCompany");
$order->getShippingAddress()->setAddressLine1("Addressline1");
$order->getShippingAddress()->setAddressLine2("Addressline2");
$order->getShippingAddress()->setZIPCode("XX21 5XX");
$order->getShippingAddress()->setCity("Cambridge");
$order->getShippingAddress()->setPhoneNumber1("+44 9999 000000");
$order->getShippingAddress()->setPhoneNumber1Type(\PaymentGateway\Model\PhoneNumberType::Fixed);
$order->getShippingAddress()->setCountryISO3166Alpha2("GB");

// Add orderline
$orderline = new \PaymentGateway\Model\Order\OrderLine();
$orderline->setLineNumber("1");
$orderline->setType(\PaymentGateway\Model\Order\OrderLineType::PhysicalItem);
$orderline->setSkuCode("1234567890123");
$orderline->setName("Bike");
$orderline->setQuantity(1.1);
$orderline->setUnitPriceExclVat(100);
$orderline->setUnitPriceInclVat(121);
$orderline->setVatPercentage(21);
$orderline->setVatPercentageLabel("Vat 21%");
$orderline->setDiscountPercentageLabel("discount 6%");
$orderline->setTotalLineAmount(121);
$order->addOrderline($orderline);

// Prepare PostRequest
$postRequest = new \PaymentGateway\Api\Gateway\PaymentJobs\PostRequest();
$postRequest->setLocale(\PaymentGateway\Model\Locale::en_GB);
$postRequest->setOrder($order);
$postRequest->setAmountToCollect(121);
$postRequest->setCurrency(\PaymentGateway\Model\Currency::GBP);
$postRequest->addPaymentMethod(\PaymentGateway\Model\PaymentMethod::Creditcard);
$postRequest->addAttribute(\PaymentGateway\Model\PaymentJob\PaymentJobAttribute::webhookUrl,"https://www.example.com");
$postRequest->addFlag(\PaymentGateway\Model\PaymentJob\PaymentJobFlag::Moto,true);
$postRequest->addParameter(\PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobParameter::returnUrlSuccess,"https://www.example.com?status=success");
$postRequest->addParameter(\PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobParameter::returnUrlCancelled,"https://www.example.com?status=cancelled");
$postRequest->addParameter(\PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobParameter::returnUrlFailed,"https://www.example.com?status=failed");
$postRequest->addParameter(\PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobParameter::simulatedStatus,"RESERVED");

$execute->callEndPoint("/api/gateway/payment-jobs","POST",$postRequest);

if ($execute->isSuccess())
{
	$result = $execute->getMappedResponse(new \PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobReference\GetResponse());
	$paymentjob = $result->getData();

	$paymentjobRef = $paymentjob->getReference();
	$paymentRef = $paymentjob->getPayments()[0]->getReference();

	// Create post for capture
	$capture = new \PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobReference\Payments\PaymentReference\Captures\PostRequest();
	$capture->setAmountToCollect(121);

	$execute->callEndPoint("/api/gateway/payment-jobs/" . $paymentjobRef . "/payments/" . $paymentRef . "/captures?locale=NL_nl","POST",$capture);
	if ($execute->isSuccess())
	{
		echo "<br>job=" . $paymentjobRef . "payref= " . $paymentRef . "json->" . ($execute->getResponseBody()) . "<br>";

		$response = new \PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobReference\Payments\PaymentReference\Captures\PostResponse();
		$execute->getMappedResponse($response);
		$payment  = $response->getData();
		var_dump($payment);
	}
	else
	{
		if ($execute->isCurlError())
		{
			var_dump($execute->getCurlError());
			return;
		}
		echo 'Responsecode' . $execute->getHttpCode();

		if ( ($execute->getResponseBody() !== NULL) && (strcasecmp($execute->getResponseContentType(),"application/json") == 0))
		{
			$result = new \PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobReference\Payments\PaymentReference\Captures\PostResponse();
			$execute->getMappedResponse($result);
			var_dump($result);
			var_dump($result->getErrorReport());
		}
		else
		{
			$result = $execute->getHttpCode() . "[" . $execute->getResponseBody() . "]";
		}
		var_dump($result);
	}

}
else
{
	if ($execute->isCurlError())
	{
		var_dump($execute->getCurlError());
		return;
	}
	echo "Responsecode:" . $execute->getHttpCode() . "<br/>";

	if ( ($execute->getResponseBody() !== NULL) && (strcasecmp($execute->getResponseContentType(),"application/json") == 0))
	{
		$result = new \PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobReference\Payments\PaymentReference\Captures\PostResponse();
		$execute->getMappedResponse($result);
		var_dump($result);
		var_dump($result->getErrorReport());
	}
	else
	{
		$result = $execute->getHttpCode() . "[" . $execute->getResponseBody() . "]";
		var_dump($result);
	}
}

echo "Complete";
