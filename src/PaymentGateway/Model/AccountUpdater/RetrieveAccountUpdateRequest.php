<?php

namespace PaymentGateway\Model\AccountUpdater
{
	/**
	 * RequestAccountUpdateRequest short summary.
	 *
	 * RequestAccountUpdateRequest description.
	 *
	 * @version 1.0
	 * @author mpoels
	 */
	use PaymentGateway\Base\JsonBase;

	class RetrieveAccountUpdateRequest extends JsonBase
	{
		/**
		 * Summary of $requestId
		 * @var string
		 */
		protected $requestId;

		/**
		 * Summary of setRequestId
		 * @param string $requestId
		 */
		function setRequestId($requestId)
		{
			$this->requestId = $requestId;
		}

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