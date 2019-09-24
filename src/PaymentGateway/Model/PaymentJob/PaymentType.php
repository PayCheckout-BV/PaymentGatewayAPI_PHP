<?php

namespace PaymentGateway\Model\PaymentJob
{
	/**
	 * PaymentType description.
	 *
	 * @version 1.0
	 * 
	 */
	class PaymentType
	{
		/**
		 * Indicates payment from customer to merchant.
		 */
		const Payment = 'Payment';

		/**
		 * Indicates payment from merchant to customer.
		 */
		const Credit = 'Credit';
	}
}