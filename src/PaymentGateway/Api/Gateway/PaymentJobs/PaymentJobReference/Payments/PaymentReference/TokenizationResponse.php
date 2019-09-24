<?php


namespace PaymentGateway\Api\Gateway\PaymentJobs\PaymentJobReference\Payments\PaymentReference
{
	use PaymentGateway\Base\JsonBase;

	/**
	 * TokenizationResponse short summary.
	 *
	 * TokenizationResponse description.
	 *
	 * @version 1.0
	 * @author mpoels
	 */

	use PaymentGateway\Api\ResponseBase;

	class TokenizationResponse extends ResponseBase
	{
		/**
		 * Summary of $token
		 * @var string
		 */
		protected $token;

		/**
		 * Summary of $cardExpiryMonth
		 * @var string
		 */
		protected $cardExpiryMonth;

		/**
		 * Summary of $cardExpiryYear
		 * @var string
		 */
		protected $cardExpiryYear;

		/**
		 * Summary of $truncatedCardNumber
		 * @var string
		 */
		protected $truncatedCardNumber;

		/**
		 * Summary of getToken
		 * @return string
		 */
		function getToken()
		{
			return $this->token;
		}

		/**
		 * Summary of getCardExpiryMonth
		 * @return string
		 */
		function getCardExpiryMonth()
		{
			return $this->cardExpiryMonth;
		}

		/**
		 * Summary of getCardExpiryYear
		 * @return string
		 */
		function getCardExpiryYear()
		{
			return $this->cardExpiryYear;
		}

		/**
		 * Summary of getTruncatedCardNumber
		 * @return string
		 */
		function getTruncatedCardNumber()
		{
			return $this->truncatedCardNumber;
		}
	}
}