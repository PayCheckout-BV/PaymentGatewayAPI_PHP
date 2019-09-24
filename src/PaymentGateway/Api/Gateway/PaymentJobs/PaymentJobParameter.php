<?php

namespace PaymentGateway\Api\Gateway\PaymentJobs
{
	/**
	 * PaymentJobParameter short summary.
	 *
	 * PaymentJobParameter description.
	 *
	 * @version 1.0
	 *
	 */
	class PaymentJobParameter
	{
		//
		// Summary:
		//     The url the clientwebbrowser is redirect to in case of a success. If not set
		//     the configured url from the configuration is used. If no url is configured a
		//     default successpage will be shown.
		const returnUrlSuccess = 'returnUrlSuccess';
		//
		// Summary:
		//     The url the clientwebbrowser is redirect to in case of non success (expired and
		//     failed). If not set the configured url from the configuration is used. If nothing
		//     is configured a default failed page will be shown.
		const returnUrlFailed = 'returnUrlFailed';
		//
		// Summary:
		//     The url the clientwebbrowser is redirect to in case of a cancel (expired,cancelled,failed
		//     etc.). If not set the configured url from the configuration is used. If nothing
		//     is configured a default failed page will be shown.
		const returnUrlCancelled = 'returnUrlCancelled';
		//
		// Summary:
		//     The url that is called whenever there are noteworthy payment job related status
		//     updates. Note that we're not sending the actual status with this call. It's up
		//     to the receiving party to manually call our APIs to get the latest status.
		const webhookUrl = 'webhookUrl';
		//
		// Summary:
		//     The supplied (integer) pageId that will be used for showing a payment page NOTE:
		//     this will override the pageId selection mechanism used in the campaign API and
		//     will influence campaign results
		const paymentPageId = 'paymentPageId';
		//
		// Summary:
		//     The simulated status.
		const simulatedStatus = 'simulatedStatus';
		//
		// Summary:
		//     This is the bank selected for any iDEAL payment.
		const IdealBic = 'IdealBic';
		//
		// Summary:
		//     The selected payment method on the hosted pages.
		const selectedPaymentMethod = 'selectedPaymentMethod';
		//
		// Summary:
		//     Name on creditcard.
		const cardName = 'cardName';
		//
		// Summary:
		//     Number on creditcard.
		const cardNumber = 'cardNumber';
		//
		// Summary:
		//     Card verification code.
		const cardCvc = 'cardCvc';
		//
		// Summary:
		//     Expiry month of creditcard.
		const cardExpiryMonth = 'cardExpiryMonth';
		//
		// Summary:
		//     Expiry year of creditcard.
		const cardExpiryYear = 'cardExpiryYear';
		//
		// Summary:
		//     3D-Secure payer authentication response.
		const paRes = 'paRes';
		/// <summary>
		/// Token provided by payment facilitator, initially used for PayPal.
		/// </summary>
		const token = 'token';
		/// <summary>
		/// Payer Id provided by payment facilitator, initially used for PayPal.
		/// </summary>
		const payerId = 'payerId';
		/// <summary>
		/// The content of the _ga cookie which is equal to the google analytics client id.
		/// </summary>
		const googleAnalyticsId = 'googleAnalyticsId';
	}
}