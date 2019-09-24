<?php

namespace PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobReference
{
	/**
	 * PostResponse short summary.
	 *
	 * PostResponse description.
	 *
	 * @version 1.0
	 * 
	 */
	use PaymentGateway\Model\PaymentJob\PaymentJob;
	use PaymentGateway\Api\ResponseBase;

	class GetResponse extends ResponseBase
	{
		/**
		 * Summary of $data
		 * @var PaymentJob
		 */
		protected $data;

		/**
		 * Summary of getData
		 * @return PaymentJob
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
					$this->data = new PaymentJob();
					$this->data->jsonDeserialize($value);
					return;
			}
			parent::setJsonData($name, $value);
		}
	}
}