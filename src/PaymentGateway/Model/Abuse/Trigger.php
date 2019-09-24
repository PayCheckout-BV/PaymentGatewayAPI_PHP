<?php

namespace PaymentGateway\Model\Abuse
{
	/**
	 * AbuseTrigger short summary.
	 *
	 * AbuseTrigger description.
	 *
	 * @version 1.0
	 * @author mpoels
	 */
	use DateTime;
	use PaymentGateway\Convert;
	use PaymentGateway\Base\JsonBase;

	class Trigger extends JsonBase
	{
		/**
		 * Summary of $score
		 * @var string
		 */
		protected $score;

		/**
		 * Summary of $code
		 * @var string
		 */
		protected $code;

		/**
		 * Summary of $description
		 * @var string
		 */
		protected $description;

		/**
		 * Summary of $parameters
		 * @var string[]
		 */
		protected $parameters;

		/**
		 * Summary of getScore
		 * @return float
		 */
		function getScore()
		{
			return Convert::StringToQuantity($this->score);
		}

		/**
		 * Summary of getCode
		 * @return string
		 */
		function getCode()
		{
			return $this->code;
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
		 * Summary of getParameters
		 * @return string[]
		 */
		function getParameters()
		{
			return $this->parameters;
		}

		protected function setJsonData($name, $value)
		{
			switch($name)
			{
				case 'parameters':
					if (is_array($value))
					{
						$this->parameters = $value;
					}
					return;
			}
			parent::setJsonData($name, $value);
		}
	}
}