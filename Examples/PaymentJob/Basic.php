<?php

echo "Starting\n";

include "..\..\src\PaymentGateway\autoloader.php";

// Create an executor instance
$execute = new \PaymentGateway\Executor("12345","DE6DA27F-ACFC-463B-91F7-F852FEAC256B","https://secure-dev.paycheckout.com");

// Prepare PostRequest
$postRequest = new \PaymentGateway\Api\Gateway\PaymentJobs\PostRequest();
$postRequest->setLocale(\PaymentGateway\Model\Locale::en_GB);
$postRequest->setAmountToCollect(121);
$postRequest->setCurrency(\PaymentGateway\Model\Currency::GBP);

//echo "<br>json->" . json_encode($postRequest);

// Execute the call
$execute->callEndPoint("/api/gateway/payment-jobs","POST",$postRequest);

// Analyze result
if ($execute->isSuccess())
{
	//echo "<br>json->" . ($execute->getResponseBody()) . "<br>";

	$result = new \PaymentGateway\Api\Gateway\PaymentJobs\PostResponse();
	$execute->getMappedResponse($result);

	echo "redirectlink->" . $result->getLinks()->getAction()->getUrl() . "<br/>";

	//var_dump($result);
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

echo "<br/>Complete";
