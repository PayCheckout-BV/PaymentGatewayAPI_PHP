<?php

namespace PaymentGateway\Model\AccountUpdater
{
	/**
	 * AbuRawResponse short summary.
	 *
	 * AbuRawResponse description.
	 *
	 * @version 1.0
	 * @author mpoels
	 */

	use PaymentGateway\Base\JsonBase;

	class AbuRawResponse extends JsonBase
	{
		/**
		 * Summary of $reasonIdentifier
		 * @var string
		 */
		protected $reasonIdentifier;

		/**
		 * Summary of $responseIndicator
		 * @var string
		 */
		protected $responseIndicator;

		/**
		 * Summary of getReasonIdentifier
		 * @return string
		 */
		function getReasonIdentifier()
		{
			return $this->reasonIdentifier;
		}

		/**
		 * Summary of getResponseIndicator
		 * @return string
		 */
		function getResponseIndicator()
		{
			return $this->responseIndicator;
		}
	}
}