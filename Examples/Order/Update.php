<?php

/**
 * Update short summary.
 *
 * Update description.
 *
 * @version 1.0
 *
 */
echo "Starting<br/>";

include "..\..\src\PaymentGateway\autoloader.php";

use DateTime;

// Use secondary password to assure the second password is recognized
$execute = new \PaymentGateway\Executor("12345","DD8DE8DD-4713-4EDA-8990-1980BD9F6BEA","https://secure-dev.paycheckout.com");

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

if ($execute->isSuccess())
{
	$result = new \PaymentGateway\Api\GateWay\PaymentJobs\PostResponse();
	$execute->getMappedResponse($result);
	$paymentjob = $result->getData();
	$ref = $paymentjob->getReference();

	// Update everything from the original order
	$postRequest = $paymentjob->getOrder();
	$postRequest->setOrderNumber("2019-03-25/1001");
	$postRequest->setNote("Updated order");

	// Alter identity
	$postRequest->getBillingIdentity()->setEmailAddress("sales@example.com");
	$postRequest->getBillingIdentity()->setGender(\PaymentGateway\Model\Gender::Female);
	$postRequest->getBillingIdentity()->setDateOfBirth(new DateTime('2010-03-17'));

	// alter addresses
	$postRequest->getBillingAddress()->setTitle("Mr.");
	$postRequest->getBillingAddress()->setFirstName("John");
	$postRequest->getBillingAddress()->setMiddleName(null);
	$postRequest->getBillingAddress()->setLastName("Doe");
	$postRequest->getBillingAddress()->setOrganisation("TestCompany");
	$postRequest->getBillingAddress()->setAddressLine1("Addressline1");
	$postRequest->getBillingAddress()->setAddressLine2("Addressline2");
	$postRequest->getBillingAddress()->setZIPCode("XX21 5XX");
	$postRequest->getBillingAddress()->setCity("Cambridge");
	$postRequest->getBillingAddress()->setPhoneNumber1("+44 9999 000000");
	$postRequest->getBillingAddress()->setPhoneNumber1Type(\PaymentGateway\Model\PhoneNumberType::Fixed);
	$postRequest->getBillingAddress()->setCountryISO3166Alpha2("GB");

	$postRequest->getShippingAddress()->setTitle("Mr.");
	$postRequest->getShippingAddress()->setFirstName("John");
	$postRequest->getShippingAddress()->setMiddleName("Van");
	$postRequest->getShippingAddress()->setLastName("Dijk");
	$postRequest->getShippingAddress()->setOrganisation("Sample Business Ltd");
	$postRequest->getShippingAddress()->setAddressLine1("Business Centre Road");
	$postRequest->getShippingAddress()->setAddressLine2("Unit 7");
	$postRequest->getShippingAddress()->setZIPCode("XX12 1XX");
	$postRequest->getShippingAddress()->setCity("TestCity");
	$postRequest->getShippingAddress()->setPhoneNumber1("+44 9999 123456");
	$postRequest->getShippingAddress()->setPhoneNumber1Type(\PaymentGateway\Model\PhoneNumberType::Fixed);
	$postRequest->getShippingAddress()->setPhoneNumber2("+44 8888 123456");
	$postRequest->getShippingAddress()->setPhoneNumber2Type(\PaymentGateway\Model\PhoneNumberType::Unknown);
	$postRequest->getShippingAddress()->setCountryISO3166Alpha2("GB");


	// alter orderlines
	$postRequest->clearOrderlines();

	// Orderlines are set by supplying all order lines of the altered order
	$orderline = new \PaymentGateway\Model\Order\OrderLine();
	$orderline->setLineNumber("1");
	$orderline->setType(\PaymentGateway\Model\Order\OrderLineType::PhysicalItem);
	$orderline->setSkuCode("1234567890123");
	$orderline->setName("Bike");
	$orderline->setQuantity(1);
	$orderline->setUnitPriceExclVat(100);
	$orderline->setUnitPriceInclVat(121);
	$orderline->setVatPercentage(21);
	$orderline->setVatPercentageLabel("Vat 21%");
	$orderline->setDiscountPercentageLabel("discount 6%");
	$orderline->setTotalLineAmount(121);
	$postRequest->addOrderLine($orderline);

	$orderline = new \PaymentGateway\Model\Order\OrderLine();
	$orderline->setLineNumber("2");
	$orderline->setType(\PaymentGateway\Model\Order\OrderLineType::PhysicalItem);
	$orderline->setSkuCode("1234567890124");
	$orderline->setName("Bike 2");
	$orderline->setQuantity(2);
	$orderline->setUnitPriceExclVat(100);
	$orderline->setUnitPriceInclVat(121);
	$orderline->setVatPercentage(21);
	$orderline->setVatPercentageLabel("Vat 21%");
	$orderline->setDiscountPercentageLabel("discount 6%");
	$orderline->setTotalLineAmount(242);
	$postRequest->addOrderLine($orderline);

	echo '<br/>postrequest ->json' . json_encode($postRequest) . '<br/>';


	$execute->callEndPoint("/api/gateway/payment-jobs/" .$ref . "/order","PUT",$postRequest);

	if ($execute->isSuccess())
	{
		echo '<br/><br/>response json->' . $execute->getResponseBody() . '<br/>';

		$result = $execute->getHttpCode() . "[" . $execute->getResponseBody() . "]";
		var_dump($result);
		echo "Update successfull<br/>";
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
