<?php

namespace PaymentGateway\Model\PaymentJob\SplitOutpayment
{
	/**
	 * SplitOutpaymentStatus short summary.
	 *
	 * SplitOutpaymentStatus description.
	 *
	 * @version 1.0
	 * 
	 */
	class SplitOutpaymentStatus
	{
		const Created = 'Created';
		const InProgress = 'InProgress';
		const Completed = 'Completed';
		const Failed = 'Failed';
	}
}