<?php

namespace PaymentGateway\Model\PaymentJob\Invoice
{
	/**
	 * Invoice short summary.
	 *
	 * Invoice description.
	 *
	 * @version 1.0
	 * 
	 */

	use DateTime;
	use PaymentGateway\Convert;
	use PaymentGateway\Model\Address;
	use PaymentGateway\Model\Identity;
	use PaymentGateway\Model\PaymentJob\Invoice\TrackAndTraceInfo;
	use PaymentGateway\Model\PaymentJob\Invoice\InvoiceLine;
	use PaymentGateway\Base\JsonBase;

	class Invoice extends JsonBase
	{
		/**
		 * Summary of $reference
		 * @var string
		 */
		protected $reference;

		/**
		 * Summary of $invoiceNumber
		 * @var string
		 */
		protected $invoiceNumber;

		/**
		 * Summary of $dateTimeUtc
		 * @var DateTime
		 */
		protected $dateTimeUtc;

		/**
		 * Summary of $offline
		 * @var bool
		 */
		protected $offline;

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
		 * Summary of $shipmentTrackAndTraceInfo
		 * @var TrackAndTraceInfo
		 */
		protected $shipmentTrackAndTraceInfo;

		/**
		 * Summary of $returnTrackAndTraceInfo
		 * @var TrackAndTraceInfo
		 */
		protected $returnTrackAndTraceInfo;

		/**
		 * Summary of $totalInvoiceAmount
		 * @var string
		 */
		protected $totalInvoiceAmount;

		/**
		 * Summary of $invoiceLines
		 * @var InvoiceLine[]
		 */
		protected $invoiceLines;

		/**
		 * Summary of getReference
		 * @return string
		 */
		function getReference()
		{
			return $this->reference;
		}

		/**
		 * Summary of setInvoiceNumber
		 * @param string $value
		 */
		function setInvoiceNumber($value)
		{
			$this->invoiceNumber = $value;
		}

		/**
		 * Summary of getInvoiceNumber
		 * @return string
		 */
		function getInvoiceNumber()
		{
			return $this->invoiceNumber;
		}

		/**
		 * Summary of setDateTimeUtc
		 * @param DateTime $value 
		 */
		function setDateTimeUtc($value)
		{
			$this->dateTimeUtc = $value;
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
		 * Summary of setOffline
		 * @param bool $value
		 */
		function setOffline($value)
		{
			$this->offline = $value;
		}

		/**
		 * Summary of getOffline
		 * @return boolean
		 */
		function getOffline()
		{
			return $this->offline;
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
		 * Summary of setShipmentTrackAndTraceInfo
		 * @param TrackAndTraceInfo $value
		 */
		function setShipmentTrackAndTraceInfo($value)
		{
			$this->shipmentTrackAndTraceInfo = $value;
		}

		/**
		 * Summary of getShipmentTrackAndTraceInfo
		 * @return TrackAndTraceInfo
		 */
		function getShipmentTrackAndTraceInfo()
		{
			return $this->shipmentTrackAndTraceInfo;
		}

		/**
		 * Summary of setReturnTrackAndTraceInfo
		 * @param TrackAndTraceInfo $value
		 */
		function setReturnTrackAndTraceInfo($value)
		{
			$this->returnTrackAndTraceInfo = $value;
		}

		/**
		 * Summary of getReturnTrackAndTraceInfo
		 * @return TrackAndTraceInfo
		 */
		function getReturnTrackAndTraceInfo()
		{
			return $this->returnTrackAndTraceInfo;
		}

		/**
		 * Summary of setTotalInvoiceAmount
		 * @param float $value
		 */
		function setTotalInvoiceAmount($value)
		{
			$this->totalInvoiceAmount = Convert::AmountToString($value);
		}

		/**
		 * Summary of getTotalInvoiceAmount
		 * @return float
		 */
		function getTotalInvoiceAmount()
		{
			return Convert::StringToAmount($this->totalInvoiceAmount);
		}

		/**
		 * Summary of AddInvoiceLine
		 * @param InvoiceLine $value
		 */
		function addInvoiceLine($value)
		{
			$this->invoiceLines[] = $value;
		}

		/**
		 * Summary of getInvoiceLines
		 * @return InvoiceLine[]
		 */
		function getInvoiceLines()
		{
			return $this->invoiceLines;
		}

		protected function setJsonData($name, $value)
		{
			switch($name)
			{
				case 'dateTimeUtc':
					$this->dateTimeUtc = new DateTime($value);
					return;
				case 'billingAddress':
					$this->billingAddress = new Address();
					$this->billingAddress->jsonDeserialize($value);
					return;
				case 'billingIdentity':
					$this->billingIdentity = new Identity();
					$this->billingIdentity->jsonDeserialize($value);
					return;
				case 'shipmentTrackAndTraceInfo':
					$this->shipmentTrackAndTraceInfo = new TrackAndTraceInfo();
					$this->shipmentTrackAndTraceInfo->jsonDeserialize($value);
					return;
				case 'returnTrackAndTraceInfo':
					$this->returnTrackAndTraceInfo = new TrackAndTraceInfo();
					$this->returnTrackAndTraceInfo->jsonDeserialize($value);
					return;
				case 'invoiceLines':
					// Items needs to an array (list of items)
					if (is_array($value))
					{
						foreach ($value as $itemValues)
						{
							// Check if item is an object
							if (is_object($itemValues))
							{
								// Create new item and add to items
								$item = new InvoiceLine();
								$item->jsonDeserialize($itemValues);

								$this->invoiceLines[] = $item;
							}
						}
					}
					return;
			}
			parent::setJsonData($name, $value);
		}
	}
}