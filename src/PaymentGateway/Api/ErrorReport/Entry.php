<?php

namespace PaymentGateway\Api\ErrorReport
{
	/**
	 * Entry short summary.
	 *
	 * Entry description.
	 *
	 * @version 1.0
	 * @author mpoels
	 */

	use PaymentGateway\Base\JsonBase;

	class Entry extends JsonBase
	{
		/**
		 * Summary of $code
		 * @var string
		 */
		protected $code;

		/**
		 * Summary of $message
		 * @var string
		 */
		protected $message;

		/**
		 * Summary of $parameters
		 * @var string[]
		 */
		protected $parameters;

		/**
		 * Summary of $translatedMessage
		 * @var string
		 */
		protected $translatedMessage;

		/**
		 * Summary of getCode
		 * @return string
		 */
		function getCode()
		{
			return $this->code;
		}

		/**
		 * Summary of getMessage
		 * @return string
		 */
		function getMessage()
		{
			return $this->message;
		}

		/**
		 * Summary of getParameters
		 * @return string[]
		 */
		function getParameters()
		{
			return $this->parameters;
		}

		/**
		 * Summary of getTranslatedMessage
		 * @return string
		 */
		function getTranslatedMessage()
		{
			return $this->translatedMessage;
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