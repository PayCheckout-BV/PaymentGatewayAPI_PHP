<?php

namespace PaymentGateway\Api\Gateway\PaymentJobs
{
	/**
	 * PaymentJobOption short summary.
	 *
	 * PaymentJobOption description.
	 *
	 * @version 1.0
	 *
	 */
	class PaymentJobOption
	{
		/**
		 * Marks this payment job as parent for a recurring payment job.
		 */
		const IsRecurringPaymentJobParent = 'IsRecurringPaymentJobParent';

		/**
		 * Marks this as a moto payment job.
		 */
		const IsMoto = 'IsMoto';

		/**
		 * Store the customer information for re-use.
		 */
		const StoreCustomerInformation = 'StoreCustomerInformation';

		/**
		 * Generate a token for the supplied creditcard information if payment succesfull
		 */
		const GenerateToken = 'GenerateToken';
	}
}