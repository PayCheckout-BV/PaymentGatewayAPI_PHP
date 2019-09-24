<?php

namespace PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobReference\Invoices
{
	/**
	 * PostResponse short summary.
	 *
	 * PostResponse description.
	 *
	 * @version 1.0
	 *
	 */
	use PaymentGateway\Model\PaymentJob\Invoice\Invoice;
	use PaymentGateway\Api\ResponseBase;

	class PostResponse extends ResponseBase
	{
		/**
		 * Summary of $data
		 * @var Invoice
		 */
		protected $data;

		/**
		 * Summary of getData
		 * @return Invoice
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
					$this->data = new Invoice();
					$this->data->jsonDeserialize($value);
					return;
			}
			parent::setJsonData($name, $value);
		}
	}
}