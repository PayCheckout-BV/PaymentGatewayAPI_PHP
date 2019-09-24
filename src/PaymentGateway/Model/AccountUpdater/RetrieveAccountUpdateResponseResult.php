<?php

namespace PaymentGateway\Model\AccountUpdater
{
	/**
	 * RetrieveAccountUpdateResponseDetail short summary.
	 *
	 * RetrieveAccountUpdateResponseDetail description.
	 *
	 * @version 1.0
	 * @author mpoels
	 */
	use PaymentGateway\Base\JsonBase;
	use PaymentGateway\Model\AccountUpdater\VauRawResponse;
	use PaymentGateway\Model\AccountUpdater\AbuRawResponse;

	class RetrieveAccountUpdateResponseResult extends JsonBase
	{
		/**
		 * Summary of $oldCardNumber
		 * @var string
		 */
		protected $oldCardNumber;

		/**
		 * Summary of $oldExpiryDate
		 * @var string
		 */
		protected $oldExpiryDate;

		/**
		 * Summary of $newCardNumber
		 * @var string
		 */
		protected $newCardNumber;

		/**
		 * Summary of $newExpiryDate
		 * @var string
		 */
		protected $newExpiryDate;

		/**
		 * Summary of $vauRawResponse
		 * @var VauRawResponse
		 */
		protected $vauRawResponse;

		/**
		 * Summary of $abuRawResponse
		 * @var AbuRawResponse
		 */
		protected $abuRawResponse;

		/**
		 * Summary of getOldCardNumber
		 * @return string
		 */
		function getOldCardNumber()
		{
			return $this->oldCardNumber;
		}

		/**
		 * Summary of getOldExpiryDate
		 * @return string
		 */
		function getOldExpiryDate()
		{
			return $this->oldExpiryDate;
		}

		/**
		 * Summary of getNewCardNumber
		 * @return string
		 */
		function getNewCardNumber()
		{
			return $this->newCardNumber;
		}

		/**
		 * Summary of getNewExpiryDate
		 * @return string
		 */
		function getNewExpiryDate()
		{
			return $this->newExpiryDate;
		}

		/**
		 * Summary of getVauRawResponse
		 * @return VauRawResponse
		 */
		function getVauRawResponse()
		{
			return $this->vauRawResponse;
		}

		/**
		 * Summary of getAbuRawResponse
		 * @return AbuRawResponse
		 */
		function getAbuRawResponse()
		{
			return $this->abuRawResponse;
		}

		protected function setJsonData($name, $value)
		{
			switch($name)
			{
				case 'vauRawResponse':
					$this->vauRawResponse = new VauRawResponse();
					$this->vauRawResponse->jsonDeserialize($value);
					return;
				case 'abuRawResponse':
					$this->abuRawResponse = new AbuRawResponse();
					$this->abuRawResponse->jsonDeserialize($value);
					return;
			}
			parent::setJsonData($name, $value);
		}
	}
}