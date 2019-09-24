<?php

namespace PaymentGateway\Model\PaymentJob\Payment\Capture
{
	/**
	 * Capture short summary.
	 *
	 * Capture description.
	 *
	 * @version 1.0
	 * 
	 */

	use DateTime;
	use PaymentGateway\Convert;
	use PaymentGateway\Base\JsonBase;

	class Capture extends JsonBase
	{
		/**
		 * Summary of $reference
		 * @var string
		 */
		protected $reference;

		/**
		 * Summary of $createDateTimeUtc
		 * @var DateTime
		 */
		protected $createDateTimeUtc;

		/**
		 * Summary of $status
		 * @var string
		 * One of constant defined in CaptureStatus
		 */
		protected $status;

		/**
		 * Summary of $amountToCapture
		 * @var string
		 */
		protected $amountToCapture;

		/**
		 * Summary of $convertedAmountToCapture
		 * @var string
		 */
		protected $convertedAmountToCapture;

		/**
		 * Summary of $convertedCurrency
		 * @var string
		 * One of the constants defined in Currency
		 */
		protected $convertedCurrency;

		/**
		 * Summary of $conversionRate
		 * @var string
		 */
		protected $conversionRate;

		/**
		 * Summary of $isFinalCapture
		 * @var boolean
		 */
		protected $isFinalCapture;

		/**
		 * Summary of getReference
		 * @return string
		 */
		function getReference()
		{
			return $this->reference;
		}

		/**
		 * Summary of getCreateDateTimeUtc
		 * @return DateTime
		 */
		function getCreateDateTimeUtc()
		{
			return $this->createDateTimeUtc;
		}

		/**
		 * Summary of getStatus
		 * @return string
		 */
		function getStatus()
		{
			return $this->status;
		}

		/**
		 * Summary of getAmountToCapture
		 * @return float
		 */
		function getAmountToCapture()
		{
			return Convert::StringToAmount($this->amountToCapture);
		}

		/**
		 * Summary of getConvertedAmountToCapture
		 * @return float
		 */
		function getConvertedAmountToCapture()
		{
			return Convert::StringToAmount($this->convertedAmountToCapture);
		}

		/**
		 * Summary of getConvertedCurrency
		 * @return string
		 */
		function getConvertedCurrency()
		{
			return $this->convertedCurrency;
		}

		/**
		 * Summary of getConversionRate
		 * @return float
		 */
		function getConversionRate()
		{
			return Convert::StringToAmount($this->conversionRate);
		}

		/**
		 * Summary of getIsFinalCapture
		 * @return boolean
		 */
		function getIsFinalCapture()
		{
			return $this->isFinalCapture;
		}

		protected function setJsonData($name, $value)
		{
			switch($name)
			{
				case 'createDateTimeUtc':
					$this->createDateTimeUtc = new DateTime($value);
					return;
			}
			parent::setJsonData($name, $value);
		}
	}
}