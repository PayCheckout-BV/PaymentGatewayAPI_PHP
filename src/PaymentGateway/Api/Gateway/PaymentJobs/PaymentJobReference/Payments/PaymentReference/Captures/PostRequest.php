<?php

namespace PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobReference\Payments\PaymentReference\Captures
{
	/**
	 * PostResponse short summary.
	 *
	 * PostResponse description.
	 *
	 * @version 1.0
	 * 
	 */
	use PaymentGateway\Base\JsonBase;
	use PaymentGateway\Convert;

	class PostRequest extends JsonBase
	{
		/**
		 * Summary of $data
		 * @var String
		 */
		protected $amountToCollect;

		/**
		* Summary of setAmountToCollect
		* @param float $amountToCollect 
		*/
		function setAmountToCollect($amountToCollect)
		{
			$this->amountToCollect = Convert::AmountToString($amountToCollect);
		}
	}
}