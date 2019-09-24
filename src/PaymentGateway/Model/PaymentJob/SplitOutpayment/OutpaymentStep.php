<?php

namespace PaymentGateway\Model\PaymentJob\SplitOutpayment
{
	/**
	 * OutpaymentStep short summary.
	 *
	 * OutpaymentStep description.
	 *
	 * @version 1.0
	 * 
	 */

	use DateTime;
	use PaymentGateway\Base\JsonBase;

	class OutpaymentStep extends JsonBase
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
		 * Summary of $outpaymentStepAction
		 * @var string
		 * One of the constants defined in OutpaymentStepAction
		 */
		protected $action;

		/**
		 * Summary of $status
		 * @var string
		 * One of the constants defined in SplitOutpaymentStatus
		 */
		protected $status;

		/**
		 * Summary of $description
		 * @var string
		 */
		protected $description;

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
		 * Summary of getOutpaymentStepAction
		 * @return string
		 * One of the predefined constants of OutpaymentStepAction
		 */
		function getAction()
		{
			return $this->action;
		}

		/**
		 * Summary of getSplitOutpaymentStatus
		 * @return string
		 * One of the constants defined in SplitOutpaymentStatus
		 */
		function getStatus()
		{
			return $this->status;
		}

		/**
		 * Summary of getDescription
		 * @return string
		 */
		function getDescription()
		{
			return $this->description;
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