<?php

namespace PaymentGateway\Api
{
	/**
	 * Link short summary.
	 *
	 * Link description.
	 *
	 * @version 1.0
	 * 
	 */

    use PaymentGateway\Api\LinkData;
    use PaymentGateway\Base\JsonBase;

	class Links extends JsonBase
	{
		/**
		 * Summary of $data
		 * @var LinkData
		 */
		protected $data;

		/**
		 * Summary of $action
		 * @var LinkData
		 */
		protected $action;

		/**
		 * Summary of $documentation
		 * @var LinkData
		 */
		protected $documentation;

		/**
		 * Summary of getData
		 * @return LinkData
		 */
		function getData()
		{
			return $this->data;
		}

		/**
		 * Summary of getAction
		 * @return LinkData
		 */
		function getAction()
		{
			return $this->action;
		}

		/**
		 * Summary of getDocumentation
		 * @return LinkData
		 */
		function getDocumentation()
		{
			return $this->documentation;
		}

		protected function setJsonData($name, $value)
		{
			switch($name)
			{
				case 'data':
					$this->data = new LinkData();
					$this->data->jsonDeserialize($value);
					return;
				case 'action':
					$this->action = new LinkData();
					$this->action->jsonDeserialize($value);
					return;
				case 'documentation':
					$this->documentation = new LinkData();
					$this->documentation->jsonDeserialize($value);
					return;
			}
			parent::setJsonData($name, $value);
		}
	}
}