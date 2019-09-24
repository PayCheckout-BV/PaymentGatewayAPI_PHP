<?php

namespace PaymentGateway\Api\Gateway\CreditcardTokenization
{
	/**
	 * PostRequest short summary.
	 *
	 * PostRequest description.
	 *
	 * @version 1.0
	 * @author mpoels
	 */
	use PaymentGateway\Base\JsonBase;

	class PostRequest extends JsonBase
	{
		/**
		 * Summary of $cardNumber
		 * @var string
		 */
		protected $cardNumber;

		/**
		 * Summary of $cardExpiryYear
		 * @var string
		 */
		protected $cardExpiryYear;

		/**
		 * Summary of $cardExpiryMonth
		 * @var string
		 */
		protected $cardExpiryMonth;

		/**
		 * Summary of $cardCvc
		 * @var string
		 */
		protected $cardCvc;

		/**
		 * Summary of setCardNumber
		 * @param string $cardNumer
		 */
		function setCardNumber($cardNumber)
		{
			$this->cardNumber = $cardNumber;
		}

		/**
		 * Summary of setCardExpiryYear
		 * @param string $cardExpiryYear
		 */
		function setCardExpiryYear($cardExpiryYear)
		{
			$this->cardExpiryYear = $cardExpiryYear;
		}

		/**
		 * Summary of setCardExpiryMonth
		 * @param string $cardExpiryMonth
		 */
		function setCardExpiryMonth($cardExpiryMonth)
		{
			$this->cardExpiryMonth = $cardExpiryMonth;
		}

		/**
		 * Summary of setCardCvc
		 * @param string $cardCvc 
		 */
		function setCardCvc($cardCvc)
		{
			$this->cardCvc = $cardCvc;
		}
	}
}