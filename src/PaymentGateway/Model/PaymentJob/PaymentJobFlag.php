<?php

namespace PaymentGateway\Model\PaymentJob
{
	/**
	 * PaymentJobFlag short summary.
	 *
	 * PaymentJobFlag description.
	 *
	 * @version 1.0
	 * 
	 */
	class PaymentJobFlag
	{
		/**
		 * Flag to indicate if a second chance email has been sent to the payee.
		 */
		const SecondChanceEmailSent = 'SecondChanceEmailSent';

		/**
		 * Flag to indicate if a paymentjob has been (partially) paid using the link provided
		 * in the sent second chance email.
		 */
		const PaidBySecondChanceEmail = 'PaidBySecondChanceEmail';

		/**
		 * Mail or telephone order.
		 */
		const Moto = 'Moto';

		/**
		 * Parent payment for recurring payments (subscriptions and the like).
		 */
		const RecurringParent = 'RecurringParent';

		/**
		 * Indicates a direct payment (when all the data is present upon creation of the payment job,
		 * bypassing our payment pages).
		 */
		const Direct = 'Direct';
	}
}