<?php

/**
 * Create short summary.
 *
 * Create description.
 *
 * @version 1.0
 *
 */

echo "Starting<br/>";

include "..\..\src\PaymentGateway\autoloader.php";

use DateTime;

$execute = new \PaymentGateway\Executor("12345","DE6DA27F-ACFC-463B-91F7-F852FEAC256B","https://secure-dev.paycheckout.com");

// Prepare order
$order = new \PaymentGateway\Model\Order\Order();
$order->setOrderNumber("2019-03-18/1001");
$order->setBillingIdentity(new \PaymentGateway\Model\Identity());
$order->setBillingAddress(new \PaymentGateway\Model\Address());
$order->setShippingAddress(new \PaymentGateway\Model\Address());

// Prepare identity
$order->getBillingIdentity()->setEmailAddress("John.Doe@example.com");
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
$postRequest->addOption(\PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobOption::StoreCustomerInformation);
$postRequest->addParameter(\PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobParameter::returnUrlSuccess,"https://www.example.com?status=success");
$postRequest->addParameter(\PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobParameter::returnUrlCancelled,"https://www.example.com?status=cancelled");
$postRequest->addParameter(\PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobParameter::returnUrlFailed,"https://www.example.com?status=failed");

$execute->callEndPoint("/api/gateway/payment-jobs","POST",$postRequest);

if ($execute->isSuccess())
{
	$result = new \PaymentGateway\Api\Gateway\PaymentJobs\PostResponse();
	$execute->getMappedResponse($result);
	$paymentjob = $result->getData();
	$ref = $paymentjob->getReference();

	echo '<br/> paymentjobref='. $ref;

	// Prepare Invoice in postRequest
	$invoice = new \PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobReference\Invoices\PostRequest();
	$invoice->setInvoiceNumber("2019-03-18/1001");
	$invoice->setDateTimeUtc(new DateTime("2019-04-09"));
	$invoice->setTotalInvoiceAmount(120.00);
	$invoice->setBillingIdentity(new \PaymentGateway\Model\Identity());
	$invoice->setBillingAddress(new \PaymentGateway\Model\Address());
	$invoice->setReturnTrackAndTraceInfo(new \PaymentGateway\Model\PaymentJob\Invoice\TrackAndTraceInfo());
	$invoice->setShipmentTrackAndTraceInfo(new \PaymentGateway\Model\PaymentJob\Invoice\TrackAndTraceInfo());

	// Prepare identity
	$invoice->getBillingIdentity()->setEmailAddress("martien.Doe@example.com");
	$invoice->getBillingIdentity()->setGender(\PaymentGateway\Model\Gender::Male);

	// Prepare addresses
	$invoice->getBillingAddress()->setTitle("Mr.");
	$invoice->getBillingAddress()->setFirstName("John");
	$invoice->getBillingAddress()->setMiddleName("Van");
	$invoice->getBillingAddress()->setLastName("Dijk");
	$invoice->getBillingAddress()->setOrganisation("Sample Business Ltd");
	$invoice->getBillingAddress()->setAddressLine1("Business Centre Road");
	$invoice->getBillingAddress()->setAddressLine2("Unit 7");
	$invoice->getBillingAddress()->setZIPCode("XX12 1XX");
	$invoice->getBillingAddress()->setCity("TestCity");
	$invoice->getBillingAddress()->setPhoneNumber1("+44 9999 123456");
	$invoice->getBillingAddress()->setPhoneNumber1Type(\PaymentGateway\Model\PhoneNumberType::Fixed);
	$invoice->getBillingAddress()->setPhoneNumber2("+44 8888 123456");
	$invoice->getBillingAddress()->setPhoneNumber2Type(\PaymentGateway\Model\PhoneNumberType::Unknown);
	$invoice->getBillingAddress()->setCountryISO3166Alpha2("GB");

	$invoice->getReturnTrackAndTraceInfo()->setShippingCompany("DHL");
	$invoice->getReturnTrackAndTraceInfo()->setShippingMethod("DHL Fastdelivery");
	$invoice->getReturnTrackAndTraceInfo()->setTrackingNumber("1234556666");
	$invoice->getReturnTrackAndTraceInfo()->setTrackingUrl("https://dhl.com/tracking/1234556666");

	$invoice->getShipmentTrackAndTraceInfo()->setShippingCompany("PostNL");
	$invoice->getShipmentTrackAndTraceInfo()->setShippingMethod("Aangetekend");
	$invoice->getShipmentTrackAndTraceInfo()->setTrackingNumber("123456");
	$invoice->getShipmentTrackAndTraceInfo()->setTrackingUrl("https://post.nl/tracking/123456");

	// Add invoice line
	$invoiceline = new \PaymentGateway\Model\PaymentJob\Invoice\InvoiceLine();
	$invoiceline->setLineNumber("1");
	$invoiceline->setType(\PaymentGateway\Model\Order\OrderLineType::PhysicalItem);
	$invoiceline->setSkuCode("1234567890123");
	$invoiceline->setName("Bike");
	$invoiceline->setQuantity(1);
	$invoiceline->setUnitPriceExclVat(100);
	$invoiceline->setUnitPriceInclVat(121);
	$invoiceline->setVatPercentage(21);
	$invoiceline->setVatPercentageLabel("Vat 21%");
	$invoiceline->setDiscountPercentageLabel("discount 6%");
	$invoiceline->setTotalLineAmount(121);
	$invoiceline->setTotalInvoicedLineAmount(121);
	$invoiceline->setInvoicedQuantity(1);
	$invoice->addInvoiceLine($invoiceline);

	//echo '<br/> json->' . json_encode($invoice);

	$execute->callEndPoint("/api/gateway/payment-jobs/" . $ref . "/invoices","POST",$invoice);

	if ($execute->isSuccess())
	{
		//echo "<br/>response json->" . ($execute->getResponseBody());

		$response = new \PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobReference\Invoices\PostResponse();
		$result = $execute->getMappedResponse($response);
		$available  = $result->getData();
		var_dump($available);
		echo "<br/>";
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
		echo "<br/>";
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
	echo "<br/>";
}

echo "Complete<br/>";
