<?php

namespace PaymentGateway
{
	/**
	 * Executor short summary.
	 *
	 * Executor description.
	 *
	 * @version 1.0  16-apr-2017
	 *
	 */

	use PaymentGateway\Base\CurlRequest;
	use PaymentGateway\Base\CurlResponse;
	use PaymentGateway\Base\CurlError;
	use Exception;

	class Executor
	{
		function getVersion()
		{
			// Version history
			// Date			 | Version  | Note
			// 16-apr-2019	 | 1.0.0    | First release
			// 03-may-2019   | 1.0.1	| Altered endpoints
			// 18-jun-2019   | 1.0.2	| Options for creating payment job
			// 12-jul-2019	 | 1.0.3	| Catchup of all new api functionality
			// 12-jul-2019	 | 1.0.4	| Implemented some model changes
			// 03-sep-2019   | 1.0.5    | Implemented model change regarding abuse reporting, and added property LastErrorReport in payments, Altered ErrorReport class to reflect model
			// 10-sep-2019   | 1.0.6    | Implemented payment flags and cleaned-up mixed tabs and spaces
			// 11-sep-2019   | 1.0.7    | Moved OriginatingIpAddress to payment attributes.
			return "1.0.7";
		}

		/**
		 * Summary of $passwordKey
		 * @var string
		 */
		protected $passwordKey;

		/**
		 * Summary of $terminalId
		 * @var string
		 */
		protected $terminalId;

		/**
		 * Summary of $endPoint
		 * @var string
		 */
		protected $endPoint;

		/**
		 * Summary of $httpResponseCode
		 * @var int
		 */
		protected $httpResponseCode;

		/**
		 * Summary of $responseBody
		 * @var string
		 */
		protected $responseBody;

		/**
		 * Summary of $response
		 * @var CurlResponse
		 */
		protected $response;

		/**
		 * Summary of __construct
		 * @param string $terminalId
		 * @param string $passwordKey
		 * @param bool   $useLiveEnvironment
		 */
		function __construct($terminalId,$passwordKey,$endpoint)
		{
			$this->terminalId	= $terminalId;
			$this->passwordKey	= $passwordKey;
			$this->endPoint		= $endpoint;
		}

		/**
		 * Summary of callEndPoint
		 * @param string $applicationId
		 * @param string $path
		 * @param string $method
		 * @param object $jsonSendClass
		 * @return void
		 */
		function callEndPoint($path,$method,$jsonSendClass = null)
		{
			// serialize the class to a string
			$bodyData = '';
			if ($jsonSendClass != null)
			{
				$bodyData = json_encode($jsonSendClass);
			}

			// Create request
			try
			{
				$request = new CurlRequest($this->endPoint . $path);
			}
			catch (Exception $e)
			{
				$curlError                = new CurlError(CURLE_FAILED_INIT, $e->getMessage());
				$this->httpResponseCode   = $curlError->getCode();
				$this->responseBody       = $curlError->getDescription();
				return;
			}


			$request->setMethod($method);
			$request->setContentType("application/json");
			$request->setContent($bodyData);

			// Set headers
			$headers[] = "hash: "           . $this->calculateHash($this->passwordKey,$bodyData);
			$headers[] = "terminalId: "     . $this->terminalId;
			$headers[] = "libVersion: "     . 'PHP-' . $this->getVersion();
			$request->setHeaders($headers);

			// Execute
			$this->response = $request->getResponse();
		}

		/**
		 * Summary of getHttpCode
		 * @return integer
		 */
		function getHttpCode()
		{
			if ($this->response !== null)
			{
				return $this->response->getHttpCode();
			}
			return $this->httpResponseCode;
		}

		/**
		 * Summary of isSuccess
		 * @return boolean
		 */
		function isSuccess()
		{
			if ($this->response === null)
			{
				return false;
			}
			return $this->response->isSuccess();
		}

		/**
		 * Summary of isCurlError
		 * @return boolean
		 *
		 * Return if a curlerror exists
		 */
		function isCurlError()
		{
			if ($this->response === null)
			{
				return false;
			}
			if ($this->response->getCurlError() !== null && $this->response->getCurlError()->getCode() != 0)
			{
				return true;
			}
			return false;
		}

		/**
		 * Summary of getCurlError
		 * @return \null|\PaymentGateway\Base\CurlError
		 */
		function getCurlError()
		{
			if ($this->response === null)
			{
				return null;
			}
			return $this->response->getCurlError();
		}

		/**
		 * Summary of getResponseBody
		 * @return string
		 */
		function getResponseBody()
		{
			if  ($this->response === null)
			{
				return $this->responseBody;
			}
			else
			{
				return $this->response->getBody();
			}
		}

		/**
		 * Summary of getResponseContentType
		 * @return \null|string
		 */
		function getResponseContentType()
		{
			if  ($this->response === null)
			{
				return null;
			}
			else
			{
				return $this->response->getContentType();
			}
		}

		/**
		 * Summary of getMappedResponse
		 * @param object $expectedJson
		 * @return object
		 */
		function getMappedResponse($expectedJson)
		{
			if ($this->response === null )
			{
				return null;
			}

			$data = json_decode($this->response->getBody(), false, 512, JSON_BIGINT_AS_STRING);

			if (json_last_error() == JSON_ERROR_NONE)
			{
				$expectedJson->jsonDeserialize($data);
			}
			return $expectedJson;
		}


		/**
		 * Summary of calculateHash
		 * @param string $baseString
		 * @param string $passwordToHashWith
		 * @return string
		 */
		private function calculateHash($baseString, $passwordToHashWith)
		{
			if ($baseString === null)
			{
				$baseString = '';
			}
			$computedHash = hash('sha512', $baseString . $passwordToHashWith, true);
			return strtoupper(bin2hex($computedHash));
		}
	}
}