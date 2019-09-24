<?php

/**
 * Sample: AccountUpdate Create Request
 */
echo "Starting\n";

include "..\..\..\src\PaymentGateway\autoloader.php";

// Prepare an executor instance
$execute = new \PaymentGateway\Executor("12345","DE6DA27F-ACFC-463B-91F7-F852FEAC256B","https://secure-dev.paycheckout.com");

// Prepare request to retrieve account updater status
$postRequest = new \PaymentGateway\Api\AccountUpdater\RetrieveAccountUpdate\PostRequest();
$postRequest->setRequestId("439e379451714b459213bb96af981e6b");

// Excecute
$execute->callEndPoint("/api/account-updater/retrieve-account-update","POST",$postRequest);

// Analyze result
if ($execute->isSuccess())
{
	echo "<br>json->" . ($execute->getResponseBody()) . "<br>";

	$result = new \PaymentGateway\Api\AccountUpdater\RetrieveAccountUpdate\PostResponse();
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