<?php

namespace PaymentGateway\Model\PaymentJob
{
	/**
	 * PaymentJobAttribute short summary.
	 *
	 * PaymentJobAttribute description.
	 *
	 * @version 1.0
	 * 
	 */
	class PaymentJobAttribute
	{
		/**
		 * The url that is called whenever there are noteworthy payment job related status updates.
		 * Note that we're not sending the actual status with this call. It's up to the receiving
		 * party to manually call our APIs to get the latest status.
		 */
		const webhookUrl = 'webhookUrl';
	}
}