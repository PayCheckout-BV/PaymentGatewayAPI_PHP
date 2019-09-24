<?php

/**
 * Sample: AccountUpdate Create Request
 */
echo "Starting\n";

include "..\..\..\src\PaymentGateway\autoloader.php";

// Prepare an executor instance
$execute = new \PaymentGateway\Executor("12345","DE6DA27F-ACFC-463B-91F7-F852FEAC256B","https://secure-dev.paycheckout.com");

// Prepare post request for account updater
$postRequest = new \PaymentGateway\Api\AccountUpdater\RequestAccountUpdate\PostRequest();
$postRequest->setMerchantId("2263");

// Prepare post request detail(s)
$postRequestDetail = new \PaymentGateway\Model\AccountUpdater\RequestAccountUpdateRequestDetail();
$postRequestDetail->setCardNumber("4444333322221111");
$postRequestDetail->setExpiryDate("0118");

$postRequest->addDetail($postRequestDetail);

// Excecute
$execute->callEndPoint("/api/account-updater/request-account-update","POST",$postRequest);

// Analyze result
if ($execute->isSuccess())
{
	echo "<br>json->" . ($execute->getResponseBody()) . "<br>";

	$result = new \PaymentGateway\Api\AccountUpdater\RequestAccountUpdate\PostResponse();
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