<?php

namespace PaymentGateway\Api\AccountUpdater\RequestAccountUpdate
{
	/**
	 * PostResponse short summary.
	 *
	 * PostResponse description.
	 *
	 * @version 1.0
	 * @author mpoels
	 */
	use PaymentGateway\Model\AccountUpdater\RequestAccountUpdateResponse;
	use PaymentGateway\Api\ResponseBase;

	class PostResponse extends ResponseBase
	{
		/**
		 * Summary of $data
		 * @var RequestAccountUpdateResponse
		 */
		protected $data;

		/**
		 * Summary of getData
		 * @return RequestAccountUpdateResponse
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
					$this->data = new RequestAccountUpdateResponse();
					$this->data->jsonDeserialize($value);
					return;
			}
			parent::setJsonData($name, $value);
		}
	}
}