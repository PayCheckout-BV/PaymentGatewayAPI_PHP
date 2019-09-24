<?php

namespace PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobReference\Payments\PaymentReference
{
	/**
	 * PostResponse short summary.
	 *
	 * PostResponse description.
	 *
	 * @version 1.0
	 *
	 */
	use PaymentGateway\Model\PaymentJob\Payment\Payment;
	use PaymentGateway\Api\ResponseBase;

	class GetResponse extends ResponseBase
	{
		/**
		 * Summary of $data
		 * @var Payment
		 */
		protected $data;

		/**
		 * Summary of getData
		 * @return Payment
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
					$this->data = new Payment();
					$this->data->jsonDeserialize($value);
					return;
			}
			parent::setJsonData($name, $value);
		}
	}
}