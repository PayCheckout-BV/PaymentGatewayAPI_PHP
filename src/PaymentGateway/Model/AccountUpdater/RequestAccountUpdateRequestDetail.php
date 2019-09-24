<?php

namespace PaymentGateway\Model\AccountUpdater
{
	/**
	 * RequestAccountUpdateRequestDetails short summary.
	 *
	 * RequestAccountUpdateRequestDetails description.
	 *
	 * @version 1.0
	 * @author mpoels
	 */
	use PaymentGateway\Base\JsonBase;

	class RequestAccountUpdateRequestDetail extends JsonBase
	{
		/**
		 * Summary of $cardNumber
		 * @var string
		 */
		protected $cardNumber;

		/**
		 * Summary of $expiryDate
		 * @var string
		 */
		protected $expiryDate;

		/**
		 * Summary of setCardNumber
		 * @param string $cardNumber 
		 */
		function setCardNumber($cardNumber)
		{
			$this->cardNumber = $cardNumber;
		}

		/**
		 * Summary of setExpiryDate
		 * @param string $expiryDate 
		 * Format MMYY
		 */
		function setExpiryDate($expiryDate)
		{
			$this->expiryDate = $expiryDate;
		}
	}
}