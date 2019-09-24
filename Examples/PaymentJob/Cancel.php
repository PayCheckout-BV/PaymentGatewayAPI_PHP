<?php

/**
 * Sample : Cancel a paymentjob
 */
echo "Starting\n";

include "..\..\src\PaymentGateway\autoloader.php";

// Set executor
$execute = new \PaymentGateway\Executor("12345","DE6DA27F-ACFC-463B-91F7-F852FEAC256B","https://secure-dev.paycheckout.com");

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
$postRequest->addPaymentMethod(\PaymentGateway\Model\PaymentMethod::PayPal);
$postRequest->addAttribute(\PaymentGateway\Model\PaymentJob\PaymentJobAttribute::webhookUrl,"https://www.example.com");
$postRequest->addParameter(\PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobParameter::returnUrlSuccess,"https://www.example.com?status=success");
$postRequest->addParameter(\PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobParameter::returnUrlCancelled,"https://www.example.com?status=cancelled");
$postRequest->addParameter(\PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobParameter::returnUrlFailed,"https://www.example.com?status=failed");

$execute->callEndPoint("/api/gateway/payment-jobs","POST",$postRequest);
$result = new \PaymentGateway\Api\Gateway\PaymentJobs\PostResponse();
$execute->getMappedResponse($result);

if ($execute->isSuccess())
{
	$ref = $result->getData()->getReference();


	$execute->callEndPoint("/api/gateway/payment-jobs/" . $ref . "/cancel?locale=NL_nl","PATCH",null);
	if ($execute->isSuccess())
	{
		//echo "<br>json->" . ($execute->getResponseBody()) . "<br>";

		$result = new \PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobReference\GetResponse();
		$execute->getMappedResponse($result);
		$available  = $result->getData();
		var_dump($available);
	}
	else
	{
		if ($execute->isCurlError())
		{
			var_dump($execute->getCurlError());
			return;
		}
		$result = $execute->getHttpCode() . "[" . $execute->getResponseBody() . "]";
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
	$result = $execute->getHttpCode() . "[" . $execute->getResponseBody() . "]";
	var_dump($result);
}

echo "Complete";
