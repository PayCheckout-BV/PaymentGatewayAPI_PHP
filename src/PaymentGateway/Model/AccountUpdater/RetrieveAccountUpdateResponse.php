<?php

namespace PaymentGateway\Model\AccountUpdater
{
	/**
	 * RetrieveAccountUpdateResponse short summary.
	 *
	 * RetrieveAccountUpdateResponse description.
	 *
	 * @version 1.0
	 * @author mpoels
	 */

	use PaymentGateway\Base\JsonBase;
	use PaymentGateway\Model\AccountUpdater\RetrieveAccountUpdateResponseResult;

	class RetrieveAccountUpdateResponse extends Jsonbase
	{
		/**
		 * Summary of $merchantId
		 * @var string
		 */
		protected $merchantId;

		/**
		 * Summary of $status
		 * @var string
		 */
		protected $status;

		/**
		 * Summary of $results
		 * @var RetrieveAccountUpdateResponseResult[]
		 */
		protected $results;

		/**
		 * Summary of $requestId
		 * @var string
		 */
		protected $requestId;

		/**
		 * Summary of getMerchantId
		 * @return string
		 */
		function getMerchantId()
		{
			return $this->merchantId;
		}

		/**
		 * Summary of getStatus
		 * @return string
		 */
		function getStatus()
		{
			return $this->status;
		}

		/**
		 * Summary of getResults
		 * @return RetrieveAccountUpdateResponseResult[]
		 */
		function getResults()
		{
			return $this->results;
		}

		/**
		 * Summary of getRequestId
		 * @return string
		 */
		function getRequestId()
		{
			return $this->requestId;
		}

		protected function setJsonData($name, $value)
		{
			switch($name)
			{
				case 'results':
					// Items needs to an array (list of items)
					if (is_array($value))
					{
						foreach ($value as $itemValues)
						{
							// Check if item is an object
							if (is_object($itemValues))
							{
								// Create new item and add to items
								$item = new RetrieveAccountUpdateResponseResult();
								$item->jsonDeserialize($itemValues);

								$this->details[] = $item;
							}
						}
					}
					return;
			}
			parent::setJsonData($name, $value);
		}

	}
}