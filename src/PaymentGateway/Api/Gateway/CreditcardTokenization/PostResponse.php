<?php

namespace PaymentGateway\Api\Gateway\CreditcardTokenization
{
	/**
	 * PostResponse short summary.
	 *
	 * PostResponse description.
	 *
	 * @version 1.0
	 * @author mpoels
	 */
	use PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobReference\Payments\PaymentReference\TokenizationResponse;
	use PaymentGateway\Api\ResponseBase;

	class PostResponse extends ResponseBase
	{
		/**
		 * Summary of $data
		 * @var TokenizationResponse
		 */
		protected $data;

		/**
		 * Summary of getData
		 * @return TokenizationResponse
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
					$this->data = new TokenizationResponse();
					$this->data->jsonDeserialize($value);
					return;
			}
			parent::setJsonData($name, $value);
		}
	}
}