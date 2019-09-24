<?php

namespace PaymentGateway\Api
{
	/**
	 * ErrorReport short summary.
	 *
	 * ErrorReport description.
	 *
	 * @version 1.0
	 * 
	 */
	use PaymentGateway\Api\ErrorReport\Entry;
    use PaymentGateway\Base\JsonBase;


	class ErrorReport extends JsonBase
	{
		/**
		 * Summary of $language
		 * @var string
		 * One of the constants as defined in Locale
		 */
		protected $language;

		/**
		 * Summary of $isFatalError
		 * @var bool
		 */
		protected $isFatalError;

		/**
		 * Summary of $errors
		 * @var Entry[]
		 */
		protected $errors;

		/**
		 * Summary of $warnings
		 * @var Entry[]
		 */
		protected $warnings;

		/**
		 * Summary of getLanguage
		 * @return string
		 * One of the constants as defined in Locale
		 */
		function getLanguage()
		{
			return $this->language;
		}

		/**
		 * Summary of isFatalError
		 * @return boolean
		 */
		function isFatalError()
		{
			return $this->isFatalError;
		}

		/**
		 * Summary of getErrors
		 * @return Entry[]
		 */
		function getErrors()
		{
			return $this->errors;
		}

		/**
		 * Summary of getWarnings
		 * @return Entry[]
		 */
		function getWarnings()
		{
			return $this->warnings;
		}

		protected function setJsonData($name, $value)
		{
			switch($name)
			{
				case 'errors':
					// Items needs to an array (list of items)
					if (is_array($value))
					{
						foreach ($value as $itemValues)
						{
							// Check if item is an object
							if (is_object($itemValues))
							{
								// Create new item and add to items
								$item = new Entry();
								$item->jsonDeserialize($itemValues);

								$this->errors[] = $item;
							}
						}
					}
					return;
				case 'warnings':
					// Items needs to an array (list of items)
					if (is_array($value))
					{
						foreach ($value as $itemValues)
						{
							// Check if item is an object
							if (is_object($itemValues))
							{
								// Create new item and add to items
								$item = new Entry();
								$item->jsonDeserialize($itemValues);

								$this->warnings[] = $item;
							}
						}
					}
					return;
			}

			parent::setJsonData($name, $value);
		}

	}
}