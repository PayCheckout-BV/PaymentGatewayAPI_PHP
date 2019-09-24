<?php

namespace PaymentGateway\Model\PaymentJob\SplitOutpayment
{
	/**
	 * SplitOutpayment short summary.
	 *
	 * SplitOutpayment description.
	 *
	 * @version 1.0
	 * 
	 */
	use DateTime;
	use PaymentGateway\Convert;
	use PaymentGateway\Base\JsonBase;

	class SplitOutpayment extends JsonBase
	{
		/**
		 * Summary of $createDateTimeUtc
		 * @var DateTime
		 */
		protected $createDateTimeUtc;

		/**
		 * Summary of $percentageCollected
		 * @var string
		 */
		protected $percentageCollected;

		/**
		 * Summary of $amountToSplit
		 * @var string
		 */
		protected $amountToSplit;

		/**
		 * Summary of $amountForMerchant
		 * @var string
		 */
		protected $amountForMerchant;

		/**
		 * Summary of $amountAvailableForOutpayment
		 * @var string
		 */
		protected $amountAvailableForOutpayment;

		/**
		 * Summary of $amountScheduled
		 * @var string
		 */
		protected $amountScheduled;

		/**
		 * Summary of $amountOutpaid
		 * @var string
		 */
		protected $amountOutpaid;

		/**
		 * Summary of $outpayments
		 * @var Outpayment[]
		 */
		protected $outpayments;

		/**
		 * Summary of getCreateDateTimeUtc
		 * @return DateTime
		 */
		function getCreateDateTimeUtc()
		{
			return $this->createDateTimeUtc;
		}

		/**
		 * Summary of getPercentageCollected
		 * @return float
		 */
		function getPercentageCollected()
		{
			return Convert::StringToAmount($this->percentageCollected);
		}

		/**
		 * Summary of getAmountToSplit
		 * @return float
		 */
		function getAmountToSplit()
		{
			return Convert::StringToAmount($this->amountToSplit);
		}

		/**
		 * Summary of getAmountForMerchant
		 * @return float
		 */
		function getAmountForMerchant()
		{
			return Convert::StringToAmount($this->amountForMerchant);
		}

		/**
		 * Summary of getAmountAvailableForOutpayment
		 * @return float
		 */
		function getAmountAvailableForOutpayment()
		{
			return Convert::StringToAmount($this->amountAvailableForOutpayment);
		}

		/**
		 * Summary of getAmountScheduled
		 * @return float
		 */
		function getAmountScheduled()
		{
			return Convert::StringToAmount($this->amountScheduled);
		}

		/**
		 * Summary of getAmountOutpaid
		 * @return float
		 */
		function getAmountOutpaid()
		{
			return Convert::StringToAmount($this->amountOutpaid);
		}

		/**
		 * Summary of getOutpayments
		 * @return Outpayment[]
		 */
		function getOutpayments()
		{
			return $this->outpayments;
		}

		protected function setJsonData($name, $value)
		{
			switch($name)
			{
				case 'createDateTimeUtc':
					$this->createDateTimeUtc = new DateTime($value);
					return;
				case 'outpayments':
					// Items needs to an array (list of items)
					if (is_array($value))
					{
						foreach ($value as $itemValues)
						{
							// Check if item is an object
							if (is_object($itemValues))
							{
								// Create new item and add to items
								$item = new Outpayment();
								$item->jsonDeserialize($itemValues);

								$this->outpayments[] = $item;
							}
						}
					}
					return;

			}
			parent::setJsonData($name, $value);
		}
	}
}