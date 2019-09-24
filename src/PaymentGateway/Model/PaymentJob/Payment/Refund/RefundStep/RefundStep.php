<?php

namespace PaymentGateway\Model\PaymentJob\Payment\Refund\RefundStep
{
	/**
	 * RefundStep short summary.
	 *
	 * RefundStep description.
	 *
	 * @version 1.0
	 * 
	 */
	use DateTime;
	use PaymentGateway\Base\JsonBase;

	class RefundStep extends JsonBase
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
		 * One of the constants in RefundStepAction
		 */
		protected $action;

		/**
		 * Summary of $status
		 * @var string
		 * One of the constants defined in RefundStatus
		 */
		protected $status;

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
		 */
		function getAction()
		{
			return $this->action;
		}

		/**
		 * Summary of getStatus
		 * @return string
		 * One of the constants defined in RefundStatus
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

		/**
		 * Summary of getResultAttributes
		 * @return array  (associated array or string => string)
		 */
		function getResultAttributes()
		{
			return $this->resultAttributes;
		}

		protected function setJsonData($name, $value)
		{
			switch($name)
			{
				case 'resultAttributes':
					if (is_object($value))
					{
						$array = get_object_vars($value);
						$this->resultAttributes = $array;
					}
					return;
				case 'createDateTimeUtc':
					$this->createDateTimeUtc = new DateTime($value);
					return;
			}
			parent::setJsonData($name, $value);
		}
	}
}