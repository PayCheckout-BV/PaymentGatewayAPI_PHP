<?php

namespace PaymentGateway\Model\AccountUpdater
{
	/**
	 * RequestAccountUpdateRequest short summary.
	 *
	 * RequestAccountUpdateRequest description.
	 *
	 * @version 1.0
	 * @author mpoels
	 */
	use PaymentGateway\Base\JsonBase;
	use PaymentGateway\Model\AccountUpdater\RequestAccountUpdateRequestDetail;

	class RequestAccountUpdateRequest extends JsonBase
	{
		/**
		 * Summary of $merchantId
		 * @var string
		 */
		protected $merchantId;

		/**
		 * Summary of $details
		 * @var RequestAccountUpdateRequestDetail[]
		 */
		protected $details;

		/**
		 * Summary of setMerchantId
		 * @param string $merchantId
		 */
		function setMerchantId($merchantId)
		{
			$this->merchantId = $merchantId;
		}

		/**
		 * Summary of getMerchantId
		 * @return string
		 */
		function getMerchantId()
		{
			return $this->merchantId;
		}

		/**
		 * Summary of addDetail
		 * @param RequestAccountUpdateRequestDetail $detail
		 */
		function addDetail($detail)
		{
			$this->details[] = $detail;
		}

		/**
		 * Summary of getDetails
		 * @return RequestAccountUpdateRequestDetail[]
		 */
		function getDetails()
		{
			return $this->details;
		}

		protected function setJsonData($name, $value)
		{
			switch($name)
			{
				case 'details':
					// Items needs to an array (list of items)
					if (is_array($value))
					{
						foreach ($value as $itemValues)
						{
							// Check if item is an object
							if (is_object($itemValues))
							{
								// Create new item and add to items
								$item = new RequestAccountUpdateRequestDetail();
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