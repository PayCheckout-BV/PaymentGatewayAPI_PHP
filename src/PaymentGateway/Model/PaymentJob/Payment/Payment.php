<?php

namespace PaymentGateway\Model\PaymentJob\Payment
{
	/**
	 * Payment short summary.
	 *
	 * Payment description.
	 *
	 * @version 1.0
	 *
	 */

	use DateTime;
	use PaymentGateway\Api\ErrorReport;
	use PaymentGateway\Base\JsonBase;
	use PaymentGateway\Convert;
	use PaymentGateway\Model\PaymentJob\Payment\PaymentStep\PaymentStep;
	use PaymentGateway\Model\PaymentJob\Payment\Refund\Refund;
	use PaymentGateway\Model\PaymentJob\Payment\Capture\Capture;
	use PaymentGateway\Model\Abuse\AbuseReport;

	class Payment extends JsonBase
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
		 * Summary of $paymentMethods
		 * @var string[]
		 * array of one of more constants defined in PaymentMethod
		 */
		protected $paymentMethods;

		/**
		 * Summary of $status
		 * @var string
		 * one of the constants defined in PaymentStatus
		 */
		protected $status;

		/**
		 * Summary of $LastErrorReport
		 * @var ErrorReport
		 */
		protected $lastErrorReport;

		/**
		 * Summary of $abuseReport
		 * @var AbuseReport
		 */
		protected $abuseReport;

		/**
		 * Summary of $amountToCollect
		 * @var string
		 */
		protected $amountToCollect;

		/**
		 * Summary of $surchargeAmount
		 * @var string
		 */
		protected $surchargeAmount;

		/**
		 * Summary of $convertedTotalAmount
		 * @var string
		 */
		protected $convertedTotalAmount;

		/**
		 * Summary of $convertedCurrency
		 * @var string
		 * Select one of the constants defined in Currency
		 */
		protected $convertedCurrency;

		/**
		 * Summary of $conversionRate
		 * @var string
		 */
		protected $conversionRate;

		/**
		 * Summary of $paidAmount
		 * @var string
		 */
		protected $paidAmount;

		/**
		 * Summary of $steps
		 * @var PaymentStep[]
		 */
		protected $steps;

		/**
		 * Summary of $flags
		 * @var array
		 * used strings are one of constants defined in PaymentFlag
		 */
		protected $flags;

		/**
		 * Summary of $attributes
		 * @var array (of PaymentAttribute)
		 */
		protected $attributes;

		/**
		 * Summary of $refunds
		 * @var Refund[]
		 */
		protected $refunds;

		/**
		 * Summary of $captures
		 * @var Capture[]
		 */
		protected $captures;

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
		 * Summary of getPaymentMethods
		 * @return string[]
		 */
		function getPaymentMethods()
		{
			return $this->paymentMethods;
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
		 * Summary of getLastErrorReport
		 * @return ErrorReport
		 */
		function getLastErrorReport()
		{
			return $this->lastErrorReport;
		}

		/**
		 * Summary of getAbuseReport
		 * @return AbuseReport
		 */
		function getAbuseReport()
		{
			return $this->abuseReport;
		}

		/**
		 * Summary of getAmountToCollect
		 * @return float
		 */
		function getAmountToCollect()
		{
			return Convert::StringToAmount($this->amountToCollect);
		}

		/**
		 * Summary of getSurchargeAmount
		 * @return float
		 */
		function getSurchargeAmount()
		{
			return Convert::StringToAmount($this->surchargeAmount);
		}

		/**
		 * Summary of getConvertedTotalAmount
		 * @return float
		 */
		function getConvertedTotalAmount()
		{
			return Convert::StringToAmount($this->convertedTotalAmount);
		}

		/**
		 * Summary of getConvertedCurrency
		 * @return string
		 * Returns one of the constants defined in Currency
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
		 * Summary of getPaidAmount
		 * @return float
		 */
		function getPaidAmount()
		{
			return Convert::StringToAmount($this->paidAmount);
		}

		/**
		 * Summary of getSteps
		 * @return PaymentStep[]
		 */
		function getSteps()
		{
			return $this->steps;
		}

		/**
		 * Summary of getAttributes
		 * @return array (of PaymentAttributes,Values)
		 */
		function getAttributes()
		{
			return $this->attributes;
		}

		/**
		 * Summary of getRefunds
		 * @return Refund[]
		 */
		function getRefunds()
		{
			return $this->refunds;
		}

		/**
		 * Summary of getCaptures
		 * @return Capture[]
		 */
		function getCaptures()
		{
			return $this->captures;
		}

		protected function setJsonData($name, $value)
		{
			switch($name)
			{
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
								$item = new PaymentStep();
								$item->jsonDeserialize($itemValues);

								$this->steps[] = $item;
							}
						}
					}
					return;
				case 'createDateTimeUtc':
					$this->createDateTimeUtc = new DateTime($value);
					return;
				case 'lastErrorReport':
					$this->lastErrorReport = new ErrorReport();
					$this->lastErrorReport->jsonDeserialize($value);
					return;
				case 'abuseReport':
					$this->abuseReport = new AbuseReport();
					$this->abuseReport->jsonDeserialize($value);
					return;
				case 'attributes':
					if (is_object($value))
					{
						$array = get_object_vars($value);
						$this->attributes = $array;
					}
					return;
				case 'refunds':
					// Items needs to an array (list of items)
					if (is_array($value))
					{
						foreach ($value as $itemValues)
						{
							// Check if item is an object
							if (is_object($itemValues))
							{
								// Create new item and add to items
								$item = new Refund();
								$item->jsonDeserialize($itemValues);

								$this->refunds[] = $item;
							}
						}
					}
					return;
				case 'captures':
					// Items needs to an array (list of items)
					if (is_array($value))
					{
						foreach ($value as $itemValues)
						{
							// Check if item is an object
							if (is_object($itemValues))
							{
								// Create new item and add to items
								$item = new Capture();
								$item->jsonDeserialize($itemValues);

								$this->captures[] = $item;
							}
						}
					}
					return;
			}
			parent::setJsonData($name, $value);
		}
	}
}