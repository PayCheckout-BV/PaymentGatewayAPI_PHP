<?php

namespace PaymentGateway\Model\SupportedPaymentMethods
{
	/**
	 * PaymentMethod short summary.
	 *
	 * PaymentMethod description.
	 *
	 * @version 1.0
	 * 
	 */
	use PaymentGateway\Base\JsonBase;
	use PaymentGateway\Model\SupportedPaymentMethods\Issuer;
	use PaymentGateway\Convert;

	class PaymentMethod extends JsonBase
	{
		/**
		 * Summary of $paymentMethod
		 * @var string
		 */
		protected $paymentMethod;

		/**
		 * Summary of $issuerList
		 * @var Issuer[]
		 */
		protected $issuerList;

		/**
		 * Summary of $currencies
		 * @var array (of string)
		 */
		protected $currencies;

		/**
		 * Summary of $surchargeAmount
		 * @var string
		 */
		protected $surchargeAmount;

		/**
		 * Summary of $surchargeAmountExclVat
		 * @var string
		 */
		protected $surchargeAmountExclVat;

		/**
		 * Summary of $surchargeAmountVat
		 * @var string
		 */
		protected $surchargeAmountVat;

		/**
		 * Summary of $surchargeVatPercentage
		 * @var string
		 */
		protected $surchargeVatPercentage;

		/**
		 * Summary of $description
		 * @var string
		 */
		protected $description;

		/**
		 * Summary of $logoUrl
		 * @var string
		 */
		protected $logoUrl;

		/**
		 * Summary of getPaymentMethod
		 * @return string
		 */
		function getPaymentMethod()
		{
			return $this->paymentMethod;
		}

		/**
		 * Summary of getIssuerList
		 * @return Issuer[]
		 */
		function getIssuerList()
		{
			return $this->issuerList;
		}

		/**
		 * Summary of getCurrencies
		 * @return array (of String of Currencies)
		 */
		function getCurrencies()
		{
			return $this->currencies;
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
		 * Summary of getSurchargeAmountExclVat
		 * @return float
		 */
		function getSurchargeAmountExclVat()
		{
			return Convert::StringToAmount($this->surchargeAmountExclVat);
		}

		/**
		 * Summary of getSurchargeAmountVat
		 * @return float
		 */
		function getSurchargeAmountVat()
		{
			return Convert::StringToAmount($this->surchargeAmountVat);
		}

		/**
		 * Summary of getSurchargeVatPercentage
		 * @return string
		 */
		function getSurchargeVatPercentage()
		{
			return $this->surchargeVatPercentage;
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
		 * Summary of getLogoUrl
		 * @return string
		 */
		function getLogoUrl()
		{
			return $this->logoUrl;
		}

		protected function setJsonData($name, $value)
		{
			switch($name)
			{
				case 'issuerList':
					// Items needs to an array (list of items)
					if (is_array($value))
					{
						foreach ($value as $itemValues)
						{
							// Check if item is an object
							if (is_object($itemValues))
							{
								// Create new item and add to items
								$item = new Issuer();
								$item->jsonDeserialize($itemValues);

								$this->issuerList[] = $item;
							}
						}
					}
					return;
			}
			parent::setJsonData($name, $value);
		}
	}
}