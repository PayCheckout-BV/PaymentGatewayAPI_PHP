<?php

namespace PaymentGateway\Model\Order
{
	/**
	 * OrderLine short summary.
	 *
	 * OrderLine description.
	 *
	 * @version 1.0
	 * 
	 */

	use PaymentGateway\Convert;
	use PaymentGateway\Base\JsonBase;

	class OrderLine extends JsonBase
	{
		/**
		 * Summary of $lineNumber
		 * @var string
		 */
		protected $lineNumber;

		/**
		 * Summary of $orderLineType
		 * @var string
		 * constants are defined in OrderLineType
		 */
		protected $type;

		/**
		 * Summary of $skuCode
		 * @var string
		 */
		protected $skuCode;

		/**
		 * Summary of $name
		 * @var string
		 */
		protected $name;

		/**
		 * Summary of $description
		 * @var string
		 */
		protected $description;

		/**
		 * Summary of $quantity
		 * @var string
		 */
		protected $quantity;

		/**
		 * Summary of $unitPriceExclVat
		 * @var string
		 */
		protected $unitPriceExclVat;

		/**
		 * Summary of $unitPriceInclVat
		 * @var string
		 */
		protected $unitPriceInclVat;

		/**
		 * Summary of $vatPercentage
		 * @var string
		 */
		protected $vatPercentage;

		/**
		 * Summary of $vatPercentageLabel
		 * @var string
		 */
		protected $vatPercentageLabel;

		/**
		 * Summary of $discountPercentageLabel
		 * @var string
		 */
		protected $discountPercentageLabel;

		/**
		 * Summary of $totalLineAmount
		 * @var string
		 */
		protected $totalLineAmount;

		/**
		 * Summary of $url
		 * @var string
		 */
		protected $url;

		/**
		 * Summary of setLineNumber
		 * @param string $value
		 */
		function setLineNumber($value)
		{
			$this->lineNumber = $value;
		}

		/**
		 * Summary of getLineNumber
		 * @return string
		 */
		function getLineNumber()
		{
			return $this->lineNumber;
		}

		/**
		 * Summary of setOrderLineType
		 * @param string $value
		 * constants are defined in OrderLineType
		 */
		function setType($value)
		{
			$this->type = $value;
		}

		/**
		 * Summary of getOrderLineType
		 * @return string
		 * constants are defined in OrderLineType
		 */
		function getType()
		{
			return $this->type;
		}

		/**
		 * Summary of setSkuCode
		 * @param string $value
		 */
		function setSkuCode($value)
		{
			$this->skuCode = $value;
		}

		/**
		 * Summary of getSkuCode
		 * @return string
		 */
		function getSkuCode()
		{
			return $this->skuCode;
		}

		/**
		 * Summary of setName
		 * @param string $value
		 */
		function setName($value)
		{
			$this->name = $value;
		}

		/**
		 * Summary of getName
		 * @return string
		 */
		function getName()
		{
			return $this->name;
		}

		/**
		 * Summary of setDescription
		 * @param string $value
		 */
		function setDescription($value)
		{
			$this->description = $value;
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
		 * Summary of setQuantity
		 * @param float $value
		 */
		function setQuantity($value)
		{
			$this->quantity = Convert::QuantityToString($value);
		}

		/**
		 * Summary of getQuantity
		 * @return float
		 */
		function getQuantity()
		{
			return Convert::StringToQuantity($this->quantity);
		}

		/**
		 * Summary of setUnitPriceExclVat
		 * @param float $value
		 */
		function setUnitPriceExclVat($value)
		{
			$this->unitPriceExclVat = Convert::AmountToString($value);
		}

		/**
		 * Summary of getUnitPriceExclVat
		 * @return float
		 */
		function getUnitPriceExclVat()
		{
			return Convert::StringToAmount($this->unitPriceExclVat);
		}

		/**
		 * Summary of setUnitPriceInclVat
		 * @param float $value
		 */
		function setUnitPriceInclVat($value)
		{
			$this->unitPriceInclVat = Convert::AmountToString($value);
		}

		/**
		 * Summary of getUnitPriceInclVat
		 * @return float
		 */
		function getUnitPriceInclVat()
		{
			return Convert::StringToAmount($this->unitPriceInclVat);
		}

		/**
		 * Summary of setVatPercentage
		 * @param float $value
		 */
		function setVatPercentage($value)
		{
			$this->vatPercentage = Convert::AmountToString($value);
		}

		/**
		 * Summary of getVatPercentage
		 * @return float
		 */
		function getVatPercentage()
		{
			return Convert::StringToAmount($this->vatPercentage);
		}

		/**
		 * Summary of setVatPercentageLabel
		 * @param string $value
		 */
		function setVatPercentageLabel($value)
		{
			$this->vatPercentageLabel = $value;
		}

		/**
		 * Summary of getVatPercentageLabel
		 * @return string
		 */
		function getVatPercentageLabel()
		{
			return $this->vatPercentageLabel;
		}

		/**
		 * Summary of setDiscountPercentageLabel
		 * @param string $value
		 */
		function setDiscountPercentageLabel($value)
		{
			$this->discountPercentageLabel = $value;
		}

		/**
		 * Summary of getDiscountPercentageLabel
		 * @return string
		 */
		function getDiscountPercentageLabel()
		{
			return $this->discountPercentageLabel;
		}

		/**
		 * Summary of setTotalLineAmount
		 * @param float $value
		 */
		function setTotalLineAmount($value)
		{
			$this->totalLineAmount = Convert::AmountToString($value);
		}

		/**
		 * Summary of getTotalLineAmount
		 * @return float
		 */
		function getTotalLineAmount()
		{
			return Convert::StringToAmount($this->totalLineAmount);
		}

		/**
		 * Summary of setUrl
		 * @param string $value
		 */
		function setUrl($value)
		{
			$this->url = $value;
		}

		/**
		 * Summary of getUrl
		 * @return string
		 */
		function getUrl()
		{
			return $this->url;
		}

		/**
		 * Summary of setInvoicedQuantity
		 * @param float $value
		 */
		function setInvoicedQuantity($value)
		{
			$this->invoicedQuantity = Convert::QuantityToString($value);
		}

		/**
		 * Summary of getInvoicedQuantity
		 * @return float
		 */
		function getInvoicedQuantity()
		{
			return Convert::StringToQuantity($this->invoicedQuantity);
		}
	}
}