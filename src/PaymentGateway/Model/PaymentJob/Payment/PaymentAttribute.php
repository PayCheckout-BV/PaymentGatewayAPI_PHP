<?php

namespace PaymentGateway\Model\PaymentJob\Payment
{
	/**
	 * PaymentAttribute short summary.
	 *
	 * PaymentAttribute description.
	 *
	 * @version 1.0
	 *
	 */
	class PaymentAttribute
	{
		/**
		 * The definitive URL the client web browser is redirected to in case of a success.
		 */
		const returnUrlSuccess = 'returnUrlSuccess';

		/**
		 * The definitive URL the client web browser is redirected to in case of a failure.
		 */
		const returnUrlFailed = 'returnUrlFailed';

		/*
		 * The definitive URL the client web browser is redirected to in case of cancellation.
		 */
		const returnUrlCancelled = 'returnUrlCancelled';

		/**
		 * The desired status of a simulated payment.
		 */
		const simulatedStatus = 'simulatedStatus';

		/**
		 * This is the bank selected for any iDEAL payment.
		 */
		const idealBic = 'idealBic';

		/**
		 * Transaction id received from the payment method.
		 */
		const paymentMethodTransactionId = 'paymentMethodTransactionId';

		/**
		 * Tokenised payment data.
		 */
		const token = 'token';

		/**
		 * CashFlows acquiring details.
		 */
		const cashFlowsAcquiringDetails = 'cashFlowsAcquiringDetails';
	}
}