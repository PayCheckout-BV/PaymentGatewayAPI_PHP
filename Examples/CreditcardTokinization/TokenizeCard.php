<?php

/**
 * Sample: Tokenize a creditcard
 */
echo "Starting\n";

include "..\..\src\PaymentGateway\autoloader.php";

// Prepare an executor instance
$execute = new \PaymentGateway\Executor("12345","DE6DA27F-ACFC-463B-91F7-F852FEAC256B","https://secure-dev.paycheckout.com");

// Prepare post request
$postRequest = new \PaymentGateway\Api\Gateway\CreditcardTokenization\PostRequest();
$postRequest->setCardNumber('4000000000000002');
$postRequest->setCardExpiryYear("20");
$postRequest->setCardExpiryMonth("12");
$postRequest->setCardCvc("123");

// Excecute
$execute->callEndPoint("/api/gateway/creditcard-tokenization?locale=en_GB","POST",$postRequest);

// Analyze result
if ($execute->isSuccess())
{
	echo "<br>json->" . ($execute->getResponseBody()) . "<br>";

	$result = new \PaymentGateway\Api\Gateway\CreditcardTokenization\PostResponse();
	$execute->getMappedResponse($result);
	$available  = $result->getData();

	var_dump($available);
	Var_dump($result->getErrorReport());
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
