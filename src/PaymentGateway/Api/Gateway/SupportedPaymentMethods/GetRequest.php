<?php

namespace PaymentGateway\Api\Gateway\SupportedPaymentMethods
{
	/**
	 * PostRequest short summary.
	 *
	 * PostRequest description.
	 *
	 * @version 1.0
	 * 
	 */

	use PaymentGateway\Base\JsonBase;
	use PaymentGateway\Convert;

	class GetRequest extends JsonBase
	{

		/**
		 * Summary of $collectAmount
		 * @var string
		 */
		protected $amountToCollect;

		/**
		 * Summary of $currency
		 * @var string
		 * One of the constants defined in PaymentGateway\Model\Currencies
		 */
		protected $currency;

		/**
		 * Summary of setCollectAmount
		 * @param float $value 
		 */
		function setAmountToCollect($value)
		{
			$this->amountToCollect = Convert::AmountToString($value);
		}

		/**
		 * Summary of setCurrency
		 * @param string $value 
		 */
		function setCurrency($value)
		{
			$this->currency = $value;
		}
	}
}