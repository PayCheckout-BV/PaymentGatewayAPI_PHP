<?php

namespace PaymentGateway\Model\PaymentJob\SplitOutpayment
{
	/**
	 * OutpaymentBeneficary short summary.
	 *
	 * OutpaymentBeneficary description.
	 *
	 * @version 1.0
	 * 
	 */
	use PaymentGateway\Base\JsonBase;

	class Beneficiary extends JsonBase
	{
		/**
		 * Summary of $customerId
		 * @var string
		 */
		protected $customerId;

		/**
		 * Summary of $bic
		 * @var string
			*/
		protected $bic;

		/**
		 * Summary of $iban
		 * @var string
		 */
		protected $iban;

		/**
		 * Summary of $nameOnBankAccount
		 * @var string
		 */
		protected $nameOnBankAccount;

		/**
		 * Summary of setCustomerId
		 * @param string $value
		 */
		function setCustomerId($value)
		{
			$this->customerId = $value;
		}

		/**
		 * Summary of getCustomerId
		 * @return string
		 */
		function getCustomerId()
		{
			return $this->customerId;
		}

		/**
		 * Summary of setBIC
		 * @param string $value
		 */
		function setBic($value)
		{
			$this->bic = $value;
		}

		/**
		 * Summary of getBic
		 * @return string
		 */
		function getBic()
		{
			return $this->bic;
		}

		/**
		 * Summary of setIBAN
		 * @param string $value
		 */
		function setIban($value)
		{
			$this->iban = $value;
		}

		/**
		 * Summary of getIban
		 * @return string
		 */
		function getIban()
		{
			return $this->iban;
		}

		/**
		 * Summary of setNameOnBankAccount
		 * @param string $value
		 */
		function setNameOnBankAccount($value)
		{
			$this->nameOnBankAccount = $value;
		}

		/**
		 * Summary of getNameOnBankAccount
		 * @return string
		 */
		function getNameOnBankAccount()
		{
			return $this->nameOnBankAccount;
		}
	}
}