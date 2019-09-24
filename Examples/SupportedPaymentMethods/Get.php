<?php

/**
 * Sample: Get Supported Payment Methods
 */
echo "Starting\n";

include "..\..\src\PaymentGateway\autoloader.php";

// Prepare an executor instance
$execute = new \PaymentGateway\Executor("12345","DE6DA27F-ACFC-463B-91F7-F852FEAC256B","https://secure-dev.paycheckout.com");

// Prepare get request
$getRequest = new \PaymentGateway\Api\Gateway\SupportedPaymentMethods\GetRequest();
$getRequest->setAmountToCollect(1000);
$getRequest->setCurrency("GBP");

// Excecute
$execute->callEndPoint("/api/gateway/supported-payment-methods?locale=en_GB&collectamount=100&customerreference=190729017330868224&currency=EUR","GET");

// Analyze result
if ($execute->isSuccess())
{
	echo "<br>json->" . ($execute->getResponseBody()) . "<br>";

	$result = new \PaymentGateway\Api\Gateway\SupportedPaymentMethods\GetResponse();
	$execute->getMappedResponse($result);
	$available  = $result->getData();

	foreach ($available as $paymentMethod)
	{
		var_dump($paymentMethod);
		Var_dump($result->getErrorReport());
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
