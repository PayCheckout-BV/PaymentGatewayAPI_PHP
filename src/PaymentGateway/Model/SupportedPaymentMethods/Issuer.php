<?php

namespace PaymentGateway\Model\SupportedPaymentMethods
{
	/**
	 * IdealIssuer short summary.
	 *
	 * IdealIssuer description.
	 *
	 * @version 1.0
	 * 
	 */

	use PaymentGateway\Base\JsonBase;

	class Issuer extends JsonBase
	{
		/**
		 * Summary of $bic
		 * @var string
		 */
		protected $id;

		/**
		 * Summary of $name
		 * @var string
		 */
		protected $name;

		/**
		 * Summary of $logoUrl
		 * @var string
		 */
		protected $logoUrl;

		/**
		 * Summary of getBic
		 * @return string
		 */
		function getId()
		{
			return $this->id;
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
		 * Summary of getLogoUrl
		 * @return string
		 */
		function getLogoUrl()
		{
			return $this->logoUrl;
		}
	}
}