<?php

namespace PaymentGateway\Model\AccountUpdater
{
	/**
	 * VauRawResponse short summary.
	 *
	 * VauRawResponse description.
	 *
	 * @version 1.0
	 * @author mpoels
	 */

	use PaymentGateway\Base\JsonBase;

	class VauRawResponse extends JsonBase
	{
		/**
		 * Summary of $responseCode
		 * @var string
		 */
		protected $responseCode;

		/**
		 * Summary of getResponseCode
		 * @return string
		 */
		function getResponseCode()
		{
			return $this->responseCode;
		}
	}
}