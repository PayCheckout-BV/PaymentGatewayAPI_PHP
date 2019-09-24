<?php

namespace PaymentGateway\Model\PaymentJob\SplitOutpayment
{
	/**
	 * Outpayment short summary.
	 *
	 * Outpayment description.
	 *
	 * @version 1.0
	 * 
	 */

	use DateTime;
	use PaymentGateway\Convert;
	use PaymentGateway\Model\PaymentJob\SplitOutpayment\Beneficiary;
	use PaymentGateway\Base\JsonBase;

	class Outpayment extends JsonBase
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
		 * Summary of $benificary
		 * @var Beneficiary
		 */
		protected $beneficiary;

		/**
		 * Summary of $description
		 * @var string
		 */
		protected $description;

		/**
		 * Summary of $scheduledDateTimeUtc
		 * @var DateTime
		 */
		protected $scheduledDateTimeUtc;

		/**
		 * Summary of $outPaidDateTimeUtc
		 * @var DateTime
		 */
		protected $outPaidDateTimeUtc;

		/**
		 * Summary of $percentage
		 * @var string
		 */
		protected $percentage;

		/**
		 * Summary of $amount
		 * @var string
		 */
		protected $amount;

		/**
		 * Summary of $status
		 * @var string
		 * One of the predinfed constants in SplitOutpaymentStatus
		 */
		protected $status;

		/**
		 * Summary of $steps
		 * @var OutpaymentStep[]
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
		 * Summary of getBeneficiary
		 * @return Beneficiary
		 */
		function getBeneficiary()
		{
			return $this->beneficiary;
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
		 * Summary of getScheduledDateTimeUtc
		 * @return DateTime
		 */
		function getScheduledDateTimeUtc()
		{
			return $this->scheduledDateTimeUtc;
		}

		/**
		 * Summary of getOutPaidDateTimeUtc
		 * @return DateTime
		 */
		function getOutPaidDateTimeUtc()
		{
			return $this->outPaidDateTimeUtc;
		}

		/**
		 * Summary of getPercentage
		 * @return float
		 */
		function getPercentage()
		{
			return Convert::StringToAmount($this->percentage);
		}

		/**
		 * Summary of getAmount
		 * @return float
		 */
		function getAmount()
		{
			return Convert::StringToAmount($this->amount);
		}

		/**
		 * Summary of getStatus
		 * @return string
		 * One of the predinfed constants in SplitOutpaymentStatus
		 */
		function getStatus()
		{
			return $this->status;
		}

		/**
		 * Summary of getSteps
		 * @return OutpaymentStep[]
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
				case 'outPaidDateTimeUtc':
					$this->outPaidDateTimeUtc = new DateTime($value);
					return;
				case 'scheduledDateTimeUtc':
					$this->scheduledDateTimeUtc = new DateTime($value);
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
								$item = new OutpaymentStep();
								$item->jsonDeserialize($itemValues);

								$this->steps[] = $item;
							}
						}
					}
					return;
				case 'beneficiary':
					$item = new Beneficiary();
					$item->jsonDeserialize($value);
					$this->beneficiary = $item;
					return;
			}
			parent::setJsonData($name, $value);
		}
	}
}