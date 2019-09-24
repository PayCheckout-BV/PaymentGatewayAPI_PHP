<?php

namespace PaymentGateway\Model\PaymentJob\Reversal
{
	/**
	 * Reversal short summary.
	 *
	 * Reversal description.
	 *
	 * @version 1.0
	 * 
	 */

	use DateTime;
	use PaymentGateway\Convert;
	use PaymentGateway\Model\Currency;
	use PaymentGateway\Base\JsonBase;

	class Reversal extends JsonBase
	{
		/**
		 * Summary of $reference
		 * @var string
		 */
		protected $reference;

		/**
		 * Summary of $dateTimeUtc
		 * @var DateTime
		 */
		protected $dateTimeUtc;

		/**
		 * Summary of $reversedAmount
		 * @var string
		 */
		protected $reversedAmount;

		/**
		 * Summary of $currency
		 * @var Currency
		 */
		protected $currency;

		/**
		 * Summary of $paymentReference
		 * @var string
		 */
		protected $paymentReference;

		/**
		 * Summary of $originatingPaymentMethod
		 * @var string
		 * One of the predefined constants of PaymentMethod
		 */
		protected $originatingPaymentMethod;

		/**
		 * Summary of $description
		 * @var string
		 */
		protected $description;

		/**
		 * Summary of $resultAttributes
		 * @var array
		 */
		protected $resultAttributes;

		/**
		 * Summary of getReference
		 * @return string
		 */
		function getReference()
		{
			return $this->reference;
		}

		/**
		 * Summary of getDateTimeUtc
		 * @return DateTime
		 */
		function getDateTimeUtc()
		{
			return $this->dateTimeUtc;
		}

		/**
		 * Summary of getReversedAmount
		 * @return float
		 */
		function getReversedAmount()
		{
			return Convert::StringToAmount($this->reversedAmount);
		}

		/**
		 * Summary of getCurrency
		 * @return Currency
		 */
		function getCurrency()
		{
			return $this->currency;
		}

		/**
		 * Summary of getPaymentReference
		 * @return string
		 */
		function getPaymentReference()
		{
			return $this->paymentReference;
		}

		/**
		 * Summary of getOriginatingPaymentMethod
		 * @return string
		 * One of the constants defined in PaymentMethod
		 */
		function getOriginatingPaymentMethod()
		{
			return $this->originatingPaymentMethod;
		}

		/**
		 * Summary of getDescription
		 * @return string
		 */
		function getDescription()
		{
			return $this->description;
		}

		/**
		 * Summary of getResultAttributes
		 * @return array (associated array of string => string)
		 */
		function getResultAttributes()
		{
			return $this->resultAttributes;
		}

		protected function setJsonData($name, $value)
		{
			switch($name)
			{
				case 'dateTimeUtc':
					$this->dateTimeUtc = new DateTime($value);
					return;
				case 'resultAttributes':
					if (is_object($value))
					{
						$array = get_object_vars($value);
						$this->resultAttributes = $array;
					}
					return;

			}
			parent::setJsonData($name, $value);
		}
	}
}