<?php

namespace PaymentGateway\Api\Gateway\PaymentJobs
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

	class PostResponse extends ResponseBase
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