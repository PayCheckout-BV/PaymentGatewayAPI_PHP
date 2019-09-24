<?php

echo 'Start hash calculation';

$bodyData = '{ "object": "data" }';
$password = '7C4551BC-07FB-4D31-8E1A-7B195156DD14';

echo 'Hash is ' . hashcreate::Calculate($password,$bodyData);

class hashcreate
{
	static function Calculate($password, $bodyData)
	{
		$computedHash = hash('sha512', $bodyData . $password, true);
		return strtoupper(bin2hex($computedHash));
	}
}