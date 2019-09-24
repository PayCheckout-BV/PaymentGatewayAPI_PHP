<?php

namespace PaymentGateway\Model
{
	/**
	 * Summary of Address
	 *
	 * @version 1.0
	 * 
	 */
	use PaymentGateway\Base\JsonBase;

	class Address extends JsonBase
	{
		/**
		 * Summary of $title
		 * @var string
		 */
		protected $title;

		/**
		 * Summary of $firstName
		 * @var string
		 */
		protected $firstName;

		/**
		 * Summary of $middleName
		 * @var string
		 */
		protected $middleName;

		/**
		 * Summary of $lastName
		 * @var string
		 */
		protected $lastName;

		/**
		 * Summary of $countryIso3166Alpha2
		 * @var string
		 */
		protected $countryIso3166Alpha2;

		/**
		 * Summary of $addressLine1
		 * @var string
		 */
		protected $addressLine1;

		/**
		 * Summary of $addressLine2
		 * @var string
		 */
		protected $addressLine2;

		/**
		 * Summary of $zipCode
		 * @var string
		 */
		protected $zipCode;

		/**
		 * Summary of $city
		 * @var string
		 */
		protected $city;

		/**
		 * Summary of $stateProvince
		 * @var string
		 */
		protected $stateProvince;

		/**
		 * Summary of $phoneNumber1
		 * @var string
		 */
		protected $phoneNumber1;

		/**
		 * Summary of $phoneNumberType1
		 * @var string
		 * One of the constants defined in PhoneNumberType
		 */
		protected $phoneNumber1Type;

		/**
		 * Summary of $phoneNumber2
		 * @var string
		 */
		protected $phoneNumber2;

		/**
		 * Summary of $phoneNumberType2
		 * @var string
		 * One of the constants defined in PhoneNumberType
		 * */
		protected $phoneNumber2Type;

		/**
		 * Summary of $organisation
		 * @var string
		 */
		protected $organisation;

		/**
		 * Summary of $department
		 * @var string
		 */
		protected $department;

		/**
		 * Summary of setTitle
		 * @param string $value
		 */
		function setTitle($value)
		{
			$this->title = $value;
		}

		/**
		 * Summary of getTitle
		 * @return string
		 */
		function getTitle()
		{
			return $this->title;
		}

		/**
		 * Summary of setFirstName
		 * @param mixed $value
		 */
		function setFirstName($value)
		{
			$this->firstName = $value;
		}

		/**
		 * Summary of hetFirstName
		 * @return string
		 */
		function getFirstName()
		{
			return $this->firstName;
		}

		/**
		 * Summary of setMiddleName
		 * @param string $value
		 */
		function setMiddleName($value)
		{
			$this->middleName = $value;
		}

		/**
		 * Summary of getMiddleName
		 * @return string
		 */
		function getMiddleName()
		{
			return $this->middleName;
		}

		/**
		 * Summary of setLastName
		 * @param mixed $value
		 */
		function setLastName($value)
		{
			$this->lastName = $value;
		}

		/**
		 * Summary of getLastName
		 * @return string
		 */
		function getLastName()
		{
			return $this->lastName;
		}

		/**
		 * Summary of setCountryISO3166Alpha2
		 * @param string $value
		 */
		function setCountryIso3166Alpha2($value)
		{
			$this->countryIso3166Alpha2 = $value;
		}

		/**
		 * Summary of getCountryISO3166Alpha2
		 * @return string
		 */
		function getCountryIso3166Alpha2()
		{
			return $this->countryIso3166Alpha2;
		}

		/**
		 * Summary of setAddressLine1
		 * @param string $value
		 */
		function setAddressLine1($value)
		{
			$this->addressLine1 = $value;
		}

		/**
		 * Summary of getAddressLine1
		 * @return string
		 */
		function getAddressLine1()
		{
			return $this->addressLine1;
		}

		/**
		 * Summary of setAddressLine2
		 * @param string $value
		 */
		function setAddressLine2($value)
		{
			$this->addressLine2 = $value;
		}

		/**
		 * Summary of getAddressLine2
		 * @return string
		 */
		function getAddressLine2()
		{
			return $this->addressLine2;
		}

		/**
		 * Summary of setZipCode
		 * @param string $value
		 */
		function setZipCode($value)
		{
			$this->zipCode = $value;
		}

		/**
		 * Summary of getZipCode
		 * @return string
		 */
		function getZipCode()
		{
			return $this->zipCode;
		}

		/**
		 * Summary of setCity
		 * @param string $value
		 */
		function setCity($value)
		{
			$this->city = $value;
		}

		/**
		 * Summary of getCity
		 * @return string
		 */
		function getCity()
		{
			return $this->city;
		}

		/**
		 * Summary of setStateProvince
		 * @param mixed $value
		 */
		function setStateProvince($value)
		{
			$this->stateProvince = $value;
		}

		/**
		 * Summary of getStateProvince
		 * @return string
		 */
		function getStateProvince()
		{
			return $this->stateProvince;
		}

		/**
		 * Summary of setPhoneNumber1
		 * @param string $value
		 */
		function setPhoneNumber1($value)
		{
			$this->phoneNumber1 = $value;
		}

		/**
		 * Summary of getPhoneNumber1
		 * @return string
		 */
		function getPhoneNumber1()
		{
			return $this->phoneNumber1;
		}

		/**
		 * Summary of setPhoneNumber1Type
		 * @param string $value
		 * One of the constants defined in PhoneNumberType
		 */
		function setPhoneNumber1Type($value)
		{
			$this->phoneNumber1Type = $value;
		}

		/**
		 * Summary of getPhoneNumber1Type
		 * @return string
		 * One of the constants defined in PhoneNumberType
		 */
		function getPhoneNumber1Type()
		{
			return $this->phoneNumber1Type;
		}

		/**
		 * Summary of setPhoneNumber2
		 * @param string $value
		 */
		function setPhoneNumber2($value)
		{
			$this->phoneNumber2 = $value;
		}

		/**
		 * Summary of getPhoneNumber2
		 * @return string
		 */
		function getPhoneNumber2()
		{
			return $this->phoneNumber2;
		}

		/**
		 * Summary of setPhoneNumber2Type
		 * @param string $value
		 * One of the constants defined in PhoneNumberType
		 */
		function setPhoneNumber2Type($value)
		{
			$this->phoneNumber2Type = $value;
		}

		/**
		 * Summary of getPhoneNumber2Type
		 * @return string
		 * One of the constants defined in PhoneNumberType
		 */
		function getPhoneNumber2Type()
		{
			return $this->phoneNumber2Type;
		}

		/**
		 * Summary of setOrganisation
		 * @param string $value
		 */
		function setOrganisation($value)
		{
			$this->organisation = $value;
		}

		/**
		 * Summary of getOrganisation
		 * @return string
		 */
		function getOrganisation()
		{
			return $this->organisation;
		}

		/**
		 * Summary of setDepartment
		 * @param string $value
		 */
		function setDepartment($value)
		{
			$this->department = $value;
		}

		/**
		 * Summary of getDepartment
		 * @return string
		 */
		function getDepartment()
		{
			return $this->department;
		}
	}
}