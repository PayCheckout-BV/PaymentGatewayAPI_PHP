<?php

namespace PaymentGateway\Model\Order
{
	/**
	 * OrderLineType short summary.
	 *
	 * OrderLineType description.
	 *
	 * @version 1.0
	 * 
	 */
	class OrderLineType
	{
		const PhysicalItem = 'PhysicalItem';
		const DigitalItem = 'DigitalItem';
		const ShippingCost = 'ShippingCost';
		const PaymentCost = 'PaymentCost';
		const Discount = 'Discount';
		const GiftCard = 'GiftCard';
		const ShopCredit = 'ShopCredit';
	}
}