<?php

namespace PaymentGateway\Model\PaymentJob\Invoice
{
	/**
	 * InvoiceLine short summary.
	 *
	 * InvoiceLine description.
	 *
	 * @version 1.0
	 * @author mpoels
	 */
	use PaymentGateway\Model\Order\OrderLine;
	use PaymentGateway\Convert;

	class InvoiceLine extends OrderLine
	{
		/**
		 * Summary of $invoicedQuantity
		 * @var string
		 */
		protected $invoicedQuantity;

		/**
		 * Summary of $totalInvoicedLineAmount
		 * @var string
		 */
		protected $totalInvoicedLineAmount;

		/**
		 * Summary of setTotalInvoicedLineAmount
		 * @param float $value
		 */
		function setTotalInvoicedLineAmount($value)
		{
			$this->totalInvoicedLineAmount = Convert::AmountToString($value);
		}

		/**
		 * Summary of getTotalInvoicedLineAmount
		 * @return float
		 */
		function getTotalInvoicedLineAmount()
		{
			return Convert::StringToAmount($this->totalInvoicedLineAmount);
		}
	}
}