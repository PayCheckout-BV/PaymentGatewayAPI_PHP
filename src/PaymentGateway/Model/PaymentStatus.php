<?php

namespace PaymentGateway\Model
{
	/**
	 * PaymentStatus short summary.
	 *
	 * PaymentStatus description.
	 *
	 * @version 1.0
	 * 
	 */
	class PaymentStatus
	{
		const Pending = 'Pending';
		const Reserved = 'Reserved';
		const Paid = 'Paid';
		const Cancelled = 'Cancelled';
		const Failed = 'Failed';
		const Rejected = 'Rejected';
		const Expired = 'Expired';
	}
}