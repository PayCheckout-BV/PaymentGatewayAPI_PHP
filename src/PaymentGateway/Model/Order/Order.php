<?php

namespace PaymentGateway\Model\Order
{
	/**
	 * Order short summary.
	 *
	 * Order description.
	 *
	 * @version 1.0
	 *
	 */

	use PaymentGateway\Model\Order\OrderLine;
	use PaymentGateway\Model\Address;
	use PaymentGateway\Model\Identity;
	use PaymentGateway\Base\JsonBase;
	use DateTime;

	class Order extends JsonBase
	{
		/**
		 * Summary of $orderNumber
		 * @var string
		 */
		protected $orderNumber;

		/**
		 * Summary of $note
		 * @var string
		 */
		protected $note;

		/**
		 * Summary of $createDateTimeUtc
		 * @var DateTime
		 */
		protected $createDateTimeUtc;

		/**
		 * Summary of $customerReference
		 * @var string
		 */
		protected $customerReference;

		/**
		 * Summary of $billingAddress
		 * @var Address
		 */
		protected $billingAddress;

		/**
		 * Summary of $billingIdentity
		 * @var Identity
		 */
		protected $billingIdentity;

		/**
		 * Summary of $shippingAddress
		 * @var Address
		 */
		protected $shippingAddress;

		/**
		 * Summary of $orderLines
		 * @var OrderLine[]
		 */
		protected $orderLines;

		/**
		 * Summary of set
		 * @param string $value
		 */
		function setOrderNumber($value)
		{
			$this->orderNumber = $value;
		}

		/**
		 * Summary of getOrderNumber
		 * @return string
		 */
		function getOrderNumber()
		{
			return $this->orderNumber;
		}

		/**
		 * Summary of setNote
		 * @param string $value
		 */
		function setNote($value)
		{
			$this->note = $value;
		}

		/**
		 * Summary of getNote
		 * @return string
		 */
		function getNote()
		{
			return $this->note;
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
		 * Summary of setCustomerReference
		 * @param string $customerReference 
		 */
		function setCustomerReference($customerReference)
		{
			$this->customerReference = $customerReference;
		}

		/**
		 * Summary of getCustomerReference
		 * @return string
		 */
		function getCustomerReference()
		{
			return $this->customerReference;
		}

		/**
		 * Summary of setBillingAddress
		 * @param Address $value
		 */
		function setBillingAddress($value)
		{
			$this->billingAddress = $value;
		}

		/**
		 * Summary of getBillingAddress
		 * @return Address
		 */
		function getBillingAddress()
		{
			return $this->billingAddress;
		}

		/**
		 * Summary of setBillingIdentity
		 * @param Identity $value
		 */
		function setBillingIdentity($value)
		{
			$this->billingIdentity = $value;
		}

		/**
		 * Summary of getBillingIdentity
		 * @return Identity
		 */
		function getBillingIdentity()
		{
			return $this->billingIdentity;
		}

		/**
		 * Summary of setShippingAddress
		 * @param Address $value
		 */
		function setShippingAddress($value)
		{
			$this->shippingAddress = $value;
		}

		/**
		 * Summary of getShippingAddress
		 * @return Address
		 */
		function getShippingAddress()
		{
			return $this->shippingAddress;
		}

		/**
		 * Summary of addOrderline
		 * @param OrderLine $value
		 */
		function addOrderline($value)
		{
			$this->orderLines[] = $value;
		}

		/**
		 * Summary of getOrderlines
		 * @return OrderLine[]
		 */
		function getOrderlines()
		{
			return $this->orderLines;
		}

		/**
		 * Summary of clearOrderlines
		 */
		function clearOrderlines()
		{
			$this->orderLines = array();
		}

		protected function setJsonData($name, $value)
		{
			switch($name)
			{
				case 'billingAddress':
					$this->billingAddress = new Address();
					$this->billingAddress->jsonDeserialize($value);
					return;
				case 'createDateTimeUtc':
					$this->createDateTimeUtc = new DateTime($value);
					return;
				case 'shippingAddress':
					$this->shippingAddress = new Address();
					$this->shippingAddress->jsonDeserialize($value);
					return;
				case 'billingIdentity':
					$this->billingIdentity = new Identity();
					$this->billingIdentity->jsonDeserialize($value);
				case 'orderLines':
					// Items needs to an array (list of items)
					if (is_array($value))
					{
						foreach ($value as $itemValues)
						{
							// Check if item is an object
							if (is_object($itemValues))
							{
								// Create new item and add to items
								$item = new OrderLine();
								$item->jsonDeserialize($itemValues);

								$this->orderLines[] = $item;
							}
						}
					}
					return;
			}
			parent::setJsonData($name, $value);
		}
	}
}