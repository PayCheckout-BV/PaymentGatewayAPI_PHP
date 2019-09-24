<?php

namespace PaymentGateway\Api\AccountUpdater\RetrieveAccountUpdate
{
	/**
	 * PostResponse short summary.
	 *
	 * PostResponse description.
	 *
	 * @version 1.0
	 * @author mpoels
	 */
	use PaymentGateway\Model\AccountUpdater\RetrieveAccountUpdateResponse;
	use PaymentGateway\Api\ResponseBase;

	class PostResponse extends ResponseBase
	{
		/**
		 * Summary of $data
		 * @var RetrieveAccountUpdateResponse
		 */
		protected $data;

		/**
		 * Summary of getData
		 * @return RetrieveAccountUpdateResponse
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
					$this->data = new RetrieveAccountUpdateResponse();
					$this->data->jsonDeserialize($value);
					return;
			}
			parent::setJsonData($name, $value);
		}

	}
}