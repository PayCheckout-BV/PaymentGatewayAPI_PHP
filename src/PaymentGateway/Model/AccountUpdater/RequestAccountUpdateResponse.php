<?php

namespace PaymentGateway\Model\AccountUpdater
{
	/**
	 * RequestAccountUpdateResponse short summary.
	 *
	 * RequestAccountUpdateResponse description.
	 *
	 * @version 1.0
	 * @author mpoels
	 */
	use PaymentGateway\Base\JsonBase;

	class RequestAccountUpdateResponse extends JsonBase
	{
		/**
		 * Summary of $requestId
		 * @var string
		 */
		protected $requestId;

		/**
		 * Summary of getRequestId
		 * @return string
		 */
		function getRequestId()
		{
			return $this->requestId;
		}
	}
}