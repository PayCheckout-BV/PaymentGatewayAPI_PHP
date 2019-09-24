<?php

namespace PaymentGateway\Model
{
	/**
	 * Identity short summary.
	 *
	 * Identity description.
	 *
	 * @version 1.0
	 * 
	 */

	use DateTime;
	use PaymentGateway\Base\JsonBase;

	class Identity extends JsonBase
	{
		/**
		 * Summary of $debtorId
		 * @var string
		 */
		protected $debtorId;

		/**
		 * Summary of $emailAddress
		 * @var string
		 */
		protected $emailAddress;

		/**
		 * Summary of $gender
		 * @var string
		 * One of the constants of Gender
		 */
		protected $gender;

		/**
		 * Summary of $dateOfBirth
		 * @var DateTime
		 */
		protected $dateOfBirth;

		/**
		 * Summary of $socialSecurityNumber
		 * @var string
		 */
		protected $socialSecurityNumber;

		/**
		 * Summary of $chamberOfCommerceNumber
		 * @var string
		 */
		protected $chamberOfCommerceNumber;

		/**
		 * Summary of $vatNumber
		 * @var string
		 */
		protected $vatNumber;

		/**
		 * Summary of setDebtorId
		 * @param string $value
		 */
		function setDebtorId($value)
		{
			$this->debtorId = $value;
		}

		/**
		 * Summary of getDebtorId
		 * @return string
		 */
		function getDebtorId()
		{
			return $this->debtorId;
		}

		/**
		 * Summary of setEmailAddres
		 * @param string $value
		 */
		function setEmailAddress($value)
		{
			$this->emailAddress = $value;
		}

		/**
		 * Summary of getEmailAddres
		 * @return string
		 */
		function getEmailAddress()
		{
			return $this->emailAddress;
		}

		/**
		 * Summary of setGender
		 * @param string $value
		 * One of the constants as defined in Gender
		 */
		function setGender($value)
		{
			$this->gender = $value;
		}

		/**
		 * Summary of getGender
		 * @return string
		 */
		function getGender()
		{
			return $this->gender;
		}

		/**
		 * Summary of setDateOfBirth
		 * @param DateTime $value
		 */
		function setDateOfBirth($value)
		{
			$this->dateOfBirth = $value;
		}

		/**
		 * Summary of getDateOfBirth
		 * @return DateTime
		 */
		function getDateOfBirth()
		{
			return $this->dateOfBirth;
		}

		/**
		 * Summary of setSocialSecurityNumber
		 * @param string $value
		 */
		function setSocialSecurityNumber($value)
		{
			$this->socialSecurityNumber = $value;
		}

		/**
		 * Summary of getSocialSecurityNumber
		 * @return string
		 */
		function getSocialSecurityNumber()
		{
			return $this->socialSecurityNumber;
		}

		/**
		 * Summary of setChamberOfCommerceNumber
		 * @param string $value
		 */
		function setChamberOfCommerceNumber($value)
		{
			$this->chamberOfCommerceNumber = $value;
		}

		/**
		 * Summary of getChamberOfCommerceNumber
		 * @return string
		 */
		function getChamberOfCommerceNumber()
		{
			return $this->chamberOfCommerceNumber;
		}

		/**
		 * Summary of setVatnumber
		 * @param string $value
		 */
		function setVatNumber($value)
		{
			$this->vatNumber = $value;
		}

		/**
		 * Summary of getVatNumber
		 * @return string
		 */
		function getVatNumber()
		{
			return $this->vatNumber;
		}

		protected function setJsonData($name, $value)
		{
			switch($name)
			{
				case 'dateOfBirth':
					$this->dateOfBirth = new DateTime($value);
					return;
			}
			parent::setJsonData($name, $value);
		}

	}
}