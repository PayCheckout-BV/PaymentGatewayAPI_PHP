<?php

namespace PaymentGateway\Api\Gateway\SupportedPaymentMethods
{
	/**
	 * GetResponse short summary.
	 *
	 * GetResponse description.
	 *
	 * @version 1.0
	 * 
	 */

	use PaymentGateway\Api\ResponseBase;
	use PaymentGateway\Model\SupportedPaymentMethods\PaymentMethod;

	class GetResponse extends ResponseBase
	{
		/**
		 * Summary of $data
		 * @var PaymentMethod[]
		 */
		protected $data;

		/**
		 * Summary of getData
		 * @return PaymentMethod[]
		 */
		function getData()
		{
			return $this->data;
		}

		protected function setJsonData($name, $value)
		{
			switch($name)
			{
				case 'data':
					// Items needs to an array (list of items)
					if (is_array($value))
					{
						foreach ($value as $itemValues)
						{
							// Check if item is an object
							if (is_object($itemValues))
							{
								// Create new item and add to items
								$item = new PaymentMethod();
								$item->jsonDeserialize($itemValues);

								$this->data[] = $item;
							}
						}
					}
					return;
			}
			parent::setJsonData($name, $value);
		}
	}
}