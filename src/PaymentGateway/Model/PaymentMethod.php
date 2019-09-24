<?php

namespace PaymentGateway\Model
{
	/**
	 * PaymentMethods short summary.
	 *
	 * PaymentMethods description.
	 *
	 * @version 1.0
	 * 
	 */
	class PaymentMethod
	{
		const Ideal = 'Ideal';
		const PayPal = 'PayPal';
		const Creditcard = 'Creditcard';
		const Bancontact = 'Bancontact';
		const SEPAbanktransfer = 'SEPAbanktransfer';
		const KlarnaInvoice = 'KlarnaInvoice';
		const KlarnaAccount = 'KlarnaAccount';
		const KlarnaDirect = 'KlarnaDirect';
		const AfterPay = 'AfterPay';
	}
}