<?php

/**
 * PostRequest short summary.
 *
 * PostRequest description.
 *
 * @version 1.0
 * 
 */
namespace PaymentGateway\Api\Gateway\PaymentJobs
{
	class PostRequest extends \PaymentGateway\Model\PaymentJob\PaymentJob
	{
		/**
		 * Summary of $options
		 * @var array
		 * list of strings of the predefined constants as defined in PaymentJobOption
		 */
		protected $options;

		/**
		 * Summary of $parameters
		 * @var array
		 */
		protected $parameters;

		/**
		 * Summary of addOption
		 * @param string $value
		 * Use constants defined PaymentJobOptions
		 */
		function addOption($value)
		{
			$this->options[] = $value;
		}

		/**
		 * Summary of getOptions
		 * @return string[]
		 * constants returned are one or more of the defined ones in PaymentJobOptions
		 */
		function getOptions()
		{
			return $this->options;
		}

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