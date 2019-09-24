<?php

namespace PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobReference\Invoices
{
	/**
	 * PostRequest short summary.
	 *
	 * PostRequest description.
	 *
	 * @version 1.0
	 *
	 */
	
	class PostRequest extends \PaymentGateway\Model\PaymentJob\Invoice\Invoice
	{
		/**
		 * Summary of $parameters
		 * @var array
		 */
		protected $parameters;

		/**
		 * Summary of addParameter
		 * @param string $name
		 * @param string $value
		 * For $name use constants defined in PaymentJobParameter
		 */
		function addParameter($name,$value)
		{
			$this->parameters[$name] = $value;
		}

		/**
		 * Summary of getParameters
		 * @return array
		 */
		function getParameters()
		{
			return $this->parameters;
		}

	}
}