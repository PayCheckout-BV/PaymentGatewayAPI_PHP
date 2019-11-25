<?php

namespace PaymentGateway\Model\PaymentJob
{
	/**
	 * PaymentJob short summary.
	 *
	 * PaymentJob description.
	 *
	 * @version 1.0
	 * 
	 */

	use PaymentGateway\Base\JsonBase;
	use PaymentGateway\Model\Order\Order;
	use PaymentGateway\Convert;
	use PaymentGateway\Model\PaymentJob\Payment\Payment;
	use PaymentGateway\Model\PaymentJob\Invoice\Invoice;
	use PaymentGateway\Model\PaymentJob\Reversal\Reversal;
	use PaymentGateway\Model\PaymentJob\SplitOutpayment\SplitOutpayment;
	use DateTime;

	class PaymentJob extends JsonBase
	{
		/**
		 * Summary of $reference
		 * @var string
		 */
		protected $reference;

		/**
		 * Summary of $type
		 * @var string
		 * One of constants defined in PaymentType
		 */
		protected $type;

		/**
		 * Summary of $createDateTimeUtc
		 * @var DateTime
		 */
		protected $createDateTimeUtc;

		/**
		 * Summary of $traceReference
		 * @var string
		 */
		protected $traceReference;

		/**
		 * Summary of $configurationId
		 * @var string
		 */
		protected $configurationId;

		/**
		 * Summary of $domain
		 * @var string
		 */
		protected $domain;

		/**
		 * Summary of $locale
		 * @var string
		 * one of the predefined constants as defined in Locale
		 */
		protected $locale;

		/**
		 * Summary of $order
		 * @var Order
		 */
		protected $order;

		/**
		 * Summary of $orderHistory
		 * @var Order[]
		 */
		protected $orderHistory;

		/**
		 * Summary of $paymentMethodsToUse
		 * @var array
		 * list of strings of the predefined constants as defined in PaymentMethod
		 */
		protected $paymentMethodsToUse;

		/**
		 * Summary of $displayUrl
		 * @var string
		 */
		protected $displayUrl;

		/**
		 * Summary of $currency
		 * @var string
		 * One of predefined constants in Currency
		 */
		protected $currency;

		/**
		 * Summary of $amountToCollect
	 	 * @var string
		 */
		protected $amountToCollect;

		/**
		 * Summary of $amountCollected
		 * @var string
		 */
		protected $amountCollected;

		/**
		 * Summary of $paidAmount
		 * @var string
		 */
		protected $paidAmount;

		/**
		 * Summary of $paidDateTimeUtc
		 * @var DateTime
		 */
		protected $paidDateTimeUtc;

		/**
		 * Summary of $expirationDateTimeUtc
		 * @var DateTime
		 */
		protected $expirationDateTimeUtc;

		/**
		 * Summary of $dueDateTimeUtc
		 * @var DateTime
		 */
		protected $dueDateTimeUtc;

		/**
		 * Summary of $lastSeenTimeUtc
		 * @var DateTime
		 */
		protected $lastSeenTimeUtc;

		/**
		 * Summary of $lastProcessedTimeUtc
		 * @var DateTime
		 */
		protected $lastProcessedTimeUtc;

		/**
		 * Summary of $flags
		 * @var array
		 * used strings are one of constants defined in PaymentJobFlag
		 */
		protected $flags;

		/**
		 * Summary of $attributes
		 * @var array
		 * used strings are one of constants defined in PaymentJobAttribute
		 */
		protected $attributes;

		/**
		 * Summary of $paymenStatus
		 * @var string
		 * Use one of the constants defined in PaymentStatus
		 */
		protected $paymentStatus;

		/**
		 * Summary of $reversalStatus
		 * @var string
		 * Use one of the constants defined in ReversalStatus
		 */
		protected $reversalStatus;

		/**
		 * Summary of $payments
		 * @var Payment[]
		 */
		protected $payments;

		/**
		 * Summary of $invoices
		 * @var Invoice[]
		 */
		protected $invoices;

		/**
		 * Summary of $reversals
		 * @var Reversal[]
		 */
		protected $reversals;

		/**
		 * Summary of $splitOutpayment
		 * @var SplitOutpayment
		 */
		protected $splitOutpayment;

		/**
		 * Summary of $parentPaymentJobReference
		 * @var string
		 */
		protected $parentPaymentJobReference;

		/**
		 * Summary of getReference
		 * @return string
		 */
		function getReference()
		{
			return $this->reference;
		}

		/**
		 * Summary of getType
		 * @return string
		 * One of the constants defined in PaymentType
		 */
		function getType()
		{
			return $this->type;
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
		 * Summary of getTraceReference
		 * @return string
		 */
		function getTraceReference()
		{
			return $this->traceReference;
		}

		/**
		 * Summary of getApplicationId
		 * @return string
		 */
		function getConfigurationId()
		{
			return $this->configurationId;
		}

		/**
		 * Summary of getDomain
		 * @return string
		 */
		function getDomain()
		{
			return $this->domain;
		}

		/**
		 * Summary of setLocale
		 * @param string $value
		 * Use constants defined Locale
		 */
		function setLocale($value)
		{
			$this->locale = $value;
		}

		/**
		 * Summary of getLocale
		 * @return string
		 * One of the constants defined in Locale
		 */
		function getLocale()
		{
			return $this->locale;
		}

		/**
		 * Summary of setOrder
		 * @param Order $value
		 */
		function setOrder($value)
		{
			$this->order = $value;
		}

		/**
		 * Summary of getOrder
		 * @return Order
		 */
		function getOrder()
		{
			return $this->order;
		}

		/**
		 * Summary of getOrderHistory
		 * @return Order[]
		 */
		function getOrderHistory()
		{
			return $this->orderHistory;
		}

		/**
		 * Summary of addPaymentMethod
		 * @param string $value
		 * Use constants defined PaymentMethods
		 */
		function addPaymentMethod($value)
		{
			$this->paymentMethodsToUse[] = $value;
		}

		/**
		 * Summary of getPaymentMethods
		 * @return string[]
		 * constants returned are one or more of the defined ones in PaymentMethod
		 */
		function getPaymentMethods()
		{
			return $this->paymentMethodsToUse;
		}

		/**
		 * Summary of setDisplayUrl
		 * @param string $value
		 */
		function setDisplayUrl($value)
		{
			$this->displayUrl = $value;
		}

		/**
		 * Summary of getDisplayUrl
		 * @return string
		 */
		function getDisplayUrl()
		{
			return $this->displayUrl;
		}

		/**
		 * Summary of setCurrency
		 * @param string $value
		 * for $value select constants from Currency
		 */
		function setCurrency($value)
		{
			$this->currency = $value;
		}

		/**
		 * Summary of getCurrency
		 * @return string
		 */
		function getCurrency()
		{
			return $this->currency;
		}

		/**
		 * Summary of setAmountToCollect
		 * @param float $value
		 */
		function setAmountToCollect($value)
		{
			$this->amountToCollect = Convert::AmountToString($value);
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
		 * Summary of getAmountCollected
		 * @return float
		 */
		function getAmountCollected()
		{
			return Convert::StringToAmount($this->amountCollected);
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
		 * Summary of setExpirationDateTimeUtc
		 * @param DateTime $value
		 */
		function setExpirationDateTimeUtc($value)
		{
			$this->expirationDateTimeUtc = $value;
		}

		/**
		 * Summary of getExpirationDateTimeUtc
		 * @return DateTime
		 */
		function getExpirationDateTimeUtc()
		{
			return $this->expirationDateTimeUtc;
		}

		/**
		 * Summary of getDueDateTimeUtc
		 * @return DateTime
		 */
		function getDueDateTimeUtc()
		{
			return $this->dueDateTimeUtc;
		}

		/**
		 * Summary of getLastSeenTimeUtc
		 * @return DateTime
		 */
		function getLastSeenTimeUtc()
		{
			return $this->lastSeenTimeUtc;
		}

		/**
		 * Summary of getLastProcessedTimeUtc
		 * @return DateTime
		 */
		function getLastProcessedTimeUtc()
		{
			return $this->lastProcessedTimeUtc;
		}

		/**
		 * Summary of getFlags
		 * @return array
		 * One or more of constants defined in PaymentJobFlag, values are bool
		 */
		function getFlags()
		{
			return $this->flags;
		}

		/**
		 * Summary of addFlag
		 * @param string $flag 
		 * One of the constants defined in PaymentJobFlag
		 */
		function addFlag($flag)
		{
			$this->flags[] = $flag;
		}

		/**
		 * Summary of getAttributes
		 * @return array
		 * Associative array of one or more of constants defined in PaymentJobAttributes, values are strings
		 */
		function getAttributes()
		{
			return $this->attributes;
		}

		/**
		 * Summary of addAttribute
		 * @param string $name 
		 * Use one of the constants defined in PaymentJobAttribute class
		 * @param mixed $value 
		 * The value
		 */
		function addAttribute($name,$value)
		{
			$this->attributes[$name] = $value;
		}

		/**
		 * Summary of getPaymentStatus
		 * @return string
		 * One of the constants defined in PaymentStatus
		 */
		function getPaymentStatus()
		{
			return $this->paymentStatus;
		}

		/**
		 * Summary of getReversalStatus
		 * @return string
		 * One of the constants defined in ReversalStatus
		 */
		function getReversalStatus()
		{
			return $this->reversalStatus;
		}

		/**
		 * Summary of getPayments
		 * @return Payment[]
		 */
		function getPayments()
		{
			return $this->payments;
		}

		/**
		 * Summary of getInvoices
		 * @return Invoice[]
		 */
		function getInvoices()
		{
			return $this->invoices;
		}

		/**
		 * Summary of getReversals
		 * @return Reversal[]
		 */
		function getReversals()
		{
			return $this->reversals;
		}

		/**
		 * Summary of getSplitOutpayment
		 * @return SplitOutpayment
		 */
		function getSplitOutpayment()
		{
			return $this->splitOutpayment;
		}

		/**
		 * Summary of getParentPaymentJobReference
		 * @return string
		 */
		function getParentPaymentJobReference()
		{
			return $this->parentPaymentJobReference;
		}

		/**
		 * Summary of getPaidDateTimeUtc
		 * @return DateTime
		 */
		function getPaidDateTimeUtc()
		{
			return $this->paidDateTimeUtc;
		}

		protected function setJsonData($name, $value)
		{
			switch($name)
			{
				case 'order':
					$this->order = new Order();
					$this->order->jsonDeserialize($value);
					return;
				case 'paidDateTimeUtc':
					$this->paidDateTimeUtc = new DateTime($value);
					return;
				case 'expirationDateTimeUtc':
					$this->expirationDateTimeUtc = new DateTime($value);
					return;
				case 'createDateTimeUtc':
					$this->createDateTimeUtc = new DateTime($value);
					return;
				case 'dueDateTimeUtc':
					$this->dueDateTimeUtc = new DateTime($value);
					return;
				case 'attributes':
					if (is_object($value))
					{
						$array = get_object_vars($value);
						$this->attributes = $array;
					}
					return;
				case 'flags':
					if (is_object($value))
					{
						$array = get_object_vars($value);
						$this->flags = $array;
					}
					return;
				case 'payments':
					// Items needs to an array (list of items)
					if (is_array($value))
					{
						foreach ($value as $itemValues)
						{
							// Check if item is an object
							if (is_object($itemValues))
							{
								// Create new item and add to items
								$item = new Payment();
								$item->jsonDeserialize($itemValues);

								$this->payments[] = $item;
							}
						}
					}
					return;
				case 'orderHistory':
					// Items needs to an array (list of items)
					if (is_array($value))
					{
						foreach ($value as $itemValues)
						{
							// Check if item is an object
							if (is_object($itemValues))
							{
								// Create new item and add to items
								$item = new Order();
								$item->jsonDeserialize($itemValues);

								$this->orderHistory[] = $item;
							}
						}
					}
					return;
				case 'invoices':
					// Items needs to an array (list of items)
					if (is_array($value))
					{
						foreach ($value as $itemValues)
						{
							// Check if item is an object
							if (is_object($itemValues))
							{
								// Create new item and add to items
								$item = new Invoice();
								$item->jsonDeserialize($itemValues);

								$this->invoices[] = $item;
							}
						}
					}
					return;
				case 'reversals':
					// Items needs to an array (list of items)
					if (is_array($value))
					{
						foreach ($value as $itemValues)
						{
							// Check if item is an object
							if (is_object($itemValues))
							{
								// Create new item and add to items
								$item = new Reversal();
								$item->jsonDeserialize($itemValues);

								$this->reversals[] = $item;
							}
						}
					}
					return;
				case 'splitOutpayment':
					$this->splitOutpayment = new SplitOutpayment();
					$this->splitOutpayment->jsonDeserialize($value);
					return;
			}
			parent::setJsonData($name, $value);
		}
	}
}