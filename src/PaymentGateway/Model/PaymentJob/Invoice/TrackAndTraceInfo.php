<?php

namespace PaymentGateway\Model\PaymentJob\Invoice
{
	/**
	 * TrackAndTraceInfo short summary.
	 *
	 * TrackAndTraceInfo description.
	 *
	 * @version 1.0
	 * 
	 */
	use PaymentGateway\Base\JsonBase;

	class TrackAndTraceInfo extends JsonBase
	{
		/**
		 * Summary of $trackingNumber
		 * @var string
		 */
		protected $trackingNumber;

		/**
		 * Summary of $trackingUrl
		 * @var string
		 */
		protected $trackingUrl;

		/**
		 * Summary of $shippingCompany
		 * @var string
		 */
		protected $shippingCompany;

		/**
		 * Summary of $shippingMethod
		 * @var string
		 */
		protected $shippingMethod;

		/**
		 * Summary of setTrackingNumber
		 * @param string $value
		 */
		function setTrackingNumber($value)
		{
			$this->trackingNumber = $value;
		}

		/**
		 * Summary of getTrackingNumber
		 * @return string
		 */
		function getTrackingNumber()
		{
			return $this->trackingNumber;
		}

		/**
		 * Summary of setTrackingUrl
		 * @param string $value
		 */
		function setTrackingUrl($value)
		{
			$this->trackingUrl = $value;
		}

		/**
		 * Summary of getTrackingUrl
		 * @return string
		 */
		function getTrackingUrl()
		{
			return $this->trackingUrl;
		}

		/**
		 * Summary of setShippingCompany
		 * @param string $value
		 */
		function setShippingCompany($value)
		{
			$this->shippingCompany = $value;
		}

		/**
		 * Summary of getShippingCompany
		 * @return string
		 */
		function getShippingCompany()
		{
			return $this->shippingCompany;
		}

		/**
		 * Summary of setShippingMethod
		 * @param string $value
		 */
		function setShippingMethod($value)
		{
			$this->shippingMethod = $value;
		}

		/**
		 * Summary of getShippingMethod
		 * @return string
		 */
		function getShippingMethod()
		{
			return $this->shippingMethod;
		}
	}
}