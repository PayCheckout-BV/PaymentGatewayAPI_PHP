<?php

namespace PaymentGateway\Api
{
	/**
	 * LinkData short summary.
	 *
	 * LinkData description.
	 *
	 * @version 1.0
	 * 
	 */
    use PaymentGateway\Base\JsonBase;

	class LinkData extends JsonBase
	{
		/**
		 * Summary of $url
		 * @var string
		 */
		protected $url;

		/**
		 * Summary of $type
		 * @var string
		 */
		protected $type;

		/**
		 * Summary of getUrl
		 * @return string
		 */
		function getUrl()
		{
			return $this->url;
		}

		/**
		 * Summary of getType
		 * @return string
		 */
		function getType()
		{
			return $this->type;
		}
	}
}