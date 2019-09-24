<?php

namespace PaymentGateway\Model\PaymentJob\Payment\PaymentStep
{
	/**
	 * PaymentStep short summary.
	 *
	 * PaymentStep description.
	 *
	 * @version 1.0
	 * 
	 */

	use DateTime;
	use PaymentGateway\Convert;
	use PaymentGateway\Base\JsonBase;

	class PaymentStep extends JsonBase
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
		 * Summary of $action
		 * @var string
		 * use constants of PaymentStepAction
		 */
		protected $action;

		/**
		 * Summary of $paymentMethods
		 * @var string[]
		 * use constants of PaymentMethods
		 */
		protected $paymentMethods;

		/**
		 * Summary of $status
		 * @var string
		 * use constants of PaymentStatus
		 */
		protected $status;

		/**
		 * Summary of $amountToCollect
		 * @var string
		 */
		protected $amountToCollect;

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
		 * Summary of getAction
		 * @return string
		 * One of the constants defined in PaymentStepAction
		 */
		function getAction()
		{
			return $this->action;
		}

		/**
		 * Summary of getPaymentMethods
		 * @return string[]
		 * array contains a list of constants defined in PaymentMethods
		 *
		 */
		function getPaymentMethods()
		{
			return $this->paymentMethods;
		}

		/**
		 * Summary of getStatus
		 * @return string
		 * will return on of the constants defined in PaymentStatus
		 */
		function getStatus()
		{
			return $this->status;
		}

		/**
		 * Summary of getAmountToCollect
		 * @return float
		 */
		function getAmountToCollect()
		{
			return Convert::StringToAmount($this->amountToCollect);
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