<?php

/**
 * autoloader short summary.
 *
 * autoloader description.
 *
 * @version 1.0
 * 
 */

function PaymentGateway_autoloader($className)
{
	$className  = ltrim($className, '\\');
	$fileName  = '';

	if ($lastNsPos = strripos($className, '\\')) {
		$namespace = substr($className, 0, $lastNsPos);
		$className = substr($className, $lastNsPos + 1);
		$fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
	}

	$fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
	$fileName = __DIR__ . '/../' . $fileName;

	if (file_exists($fileName)) {
		/** @noinspection PhpIncludeInspection */
		require_once($fileName);
	}
}

spl_autoload_register('PaymentGateway_autoloader',true,true);