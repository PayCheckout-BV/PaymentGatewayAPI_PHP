<?php

namespace PaymentGateway
{
	/**
	 * Convert short summary.
	 *
	 * Convert description.
	 *
	 * @version 1.0
	 * 
	 */

	class Convert
	{
		/**
		 * Summary of AmountToString
		 * @param float $amount
		 * @return string
		 */
		static function AmountToString($amount)
		{
			// 3 digits as this the highest number of digits a currency can have
			$temp = (string) round($amount, 3 , PHP_ROUND_HALF_DOWN);
			$pos = strpos($temp,".");
			if ($pos === false )
			{
				return $temp;
			}
			return substr($temp,0,$pos) . '.' . trim(substr($temp,$pos),".0");
		}

		/**
		 * Summary of StringToAmount
		 * @param string $amount
		 * @return float
		 */
		static function StringToAmount($amount)
		{
			return (double) round(doubleval($amount), 3, PHP_ROUND_HALF_DOWN);
		}

		/**
		 * Summary of QuantityToString
		 * @param float $quantity
		 * @return string
		 */
		static function QuantityToString($quantity)
		{
			// We take maximum 8 digits and strip any appended zero's
			$temp = (string) round($quantity, 8 , PHP_ROUND_HALF_DOWN);
			$pos = strpos($temp,".");
			if ($pos === false )
			{
				return $temp;
			}
			return substr($temp,0,$pos) . '.' . trim(substr($temp,$pos),".0");
		}

		/**
		 * Summary of StringToAmount
		 * @param mixed $quantity
		 * @return float
		 */
		static function StringToQuantity($quantity)
		{
			return round(doubleval($quantity), 8, PHP_ROUND_HALF_DOWN);
		}
	}
}