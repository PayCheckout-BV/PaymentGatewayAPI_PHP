<?php

namespace PaymentGateway\Model\PaymentJob\Payment\Refund
{
	/**
	 * Refund short summary.
	 *
	 * Refund description.
	 *
	 * @version 1.0
	 * 
	 */

	use PaymentGateway\Convert;
	use PaymentGateway\Base\JsonBase;
	use PaymentGateway\Model\PaymentJob\Payment\Refund\RefundStep\RefundStep;
	use DateTime;

	class Refund extends JsonBase
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
		 * Summary of $creditNumber
		 * @var string
		 */
		protected $creditNumber;

		/**
		 * Summary of $creditNote
		 * @var string
		 */
		protected $creditNote;

		/**
		 * Summary of $status
		 * @var string
		 * One of the constants defined in RefundStatus
		 */
		protected $status;

		/**
		 * Summary of $amountToRefund
		 * @var string
		 */
		protected $amountToRefund;

		/**
		 * Summary of $convertedAmountToRefund
		 * @var string
		 */
		protected $convertedAmountToRefund;

		/**
		 * Summary of $convertedCurrency
		 * @var string
		 */
		protected $convertedCurrency;

		/**
		 * Summary of $conversionRate
		 * @var string
		 * One of the constants as defined in Currency
		 */
		protected $conversionRate;

		/**
		 * Summary of $steps
		 * @var RefundStep[]
		 */
		protected $steps;

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
		 * Summary of setCreditNumber
		 * @param string $value
		 */
		function setCreditNumber($value)
		{
			$this->creditNumber = $value;
		}

		/**
		 * Summary of getCreditNumber
		 * @return string
		 */
		function getCreditNumber()
		{
			return $this->creditNumber;
		}

		/**
		 * Summary of setCreditNote
		 * @param string $value
		 */
		function setCreditNote($value)
		{
			$this->creditNote = $value;
		}

		/**
		 * Summary of getCreditNote
		 * @return string
		 */
		function getCreditNote()
		{
			return $this->creditNote;
		}

		/**
		 * Summary of getStatus
		 * @return string
		 * One of the predefined constants in RefundStatus
		 */
		function getStatus()
		{
			return $this->status;
		}

		/**
		 * Summary of setAmountToRefund
		 * @param float $value
		 */
		function setAmountToRefund($value)
		{
			$this->amountToRefund = Convert::AmountToString($value);
		}

		/**
		 * Summary of getAmountToRefund
		 * @return float
		 */
		function getAmountToRefund()
		{
			return Convert::StringToAmount($this->amountToRefund);
		}

		/**
		 * Summary of getConvvertedAmountToRefund
		 * @return float
		 */
		function getConvertedAmountToRefund()
		{
			return Convert::StringToAmount($this->convertedAmountToRefund);
		}

		/**
		 * Summary of getConvertedCurrency
		 * @return string
		 * One of the constants as defined in Currency
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
		 * Summary of getSteps
		 * @return RefundStep[]
		 */
		function getSteps()
		{
			return $this->steps;
		}

		protected function setJsonData($name, $value)
		{
			switch($name)
			{
				case 'createDateTimeUtc':
					$this->createDateTimeUtc = new DateTime($value);
					return;
				case 'steps':
					// Items needs to an array (list of items)
					if (is_array($value))
					{
						foreach ($value as $itemValues)
						{
							// Check if item is an object
							if (is_object($itemValues))
							{
								// Create new item and add to items
								$item = new RefundStep();
								$item->jsonDeserialize($itemValues);

								$this->steps[] = $item;
							}
						}
					}
					return;
			}
			parent::setJsonData($name, $value);
		}

	}
}