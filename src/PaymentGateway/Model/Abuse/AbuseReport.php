<?php

namespace PaymentGateway\Model\Abuse
{
	/**
	 * AbuseReport short summary.
	 *
	 * AbuseReport description.
	 *
	 * @version 1.0
	 * @author mpoels
	 */
	use PaymentGateway\Base\JsonBase;
	use PaymentGateway\Convert;
	use PaymentGateway\Model\Abuse\Trigger;
	use DateTime;

	class AbuseReport extends JsonBase
	{
		/**
		 * Summary of $score
		 * @var string
		 */
		protected $score;

		/**
		 * Summary of $createdDateTimeUtc
		 * @var DateTime
		 */
		protected $createdDateTimeUtc;

		/**
		 * Summary of $abuseTriggers
		 * @var Trigger[]
		 */
		protected $triggers;

		/**
		 * Summary of getScore
		 * @return float
		 */
		function getScore()
		{
			return Convert::StringToQuantity($this->score);
		}

		/**
		 * Summary of getCreatedDateTimeUtc
		 * @return DateTime
		 */
		function getCreatedDateTimeUtc()
		{
			return $this->createdDateTimeUtc;
		}

		/**
		 * Summary of getAbuseTriggers
		 * @return Trigger[]
		 */
		function getTriggers()
		{
			return $this->triggers;
		}

		protected function setJsonData($name, $value)
		{
			switch($name)
			{
				case 'createdDateTimeUtc':
					$this->createdDateTimeUtc = new DateTime($value);
					return;
				case 'triggers':
					// Items convert to an array (list of items)
					if (is_array($value))
					{
						foreach ($value as $itemValues)
						{
							// Check if item is an object
							if (is_object($itemValues))
							{
								// Create new item and add to items
								$item = new Trigger();
								$item->jsonDeserialize($itemValues);

								$this->triggers[] = $item;
							}
						}
					}
					return;
			}
			parent::setJsonData($name, $value);
		}

	}
}