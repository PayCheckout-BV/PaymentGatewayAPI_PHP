<?php

namespace PaymentGateway\Api
{
	/**
	 * ResponseBase short summary.
	 *
	 * ResponseBase description.
	 *
	 * @version 1.0
	 * 
	 */

    use PaymentGateway\Api\Links;
    use PaymentGateway\Api\ErrorReport;
    use PaymentGateway\Base\JsonBase;

	class ResponseBase extends JsonBase
	{
		/**
		 * Summary of $errorReport
		 * @var ErrorReport
		 */
		protected $errorReport;

		/**
		 * Summary of $links
		 * @var Links
		 */
		protected $links;

		/**
		 * Summary of getErrorReport
		 * @return ErrorReport
		 */
		function getErrorReport()
		{
			return $this->errorReport;
		}

		/**
		 * Summary of getLinks
		 * @return Links
		 */
		function getLinks()
		{
			return $this->links;
		}

		protected function setJsonData($name, $value)
		{
			switch($name)
			{
				case 'errorReport':
					$this->errorReport = new ErrorReport();
					$this->errorReport->jsonDeserialize($value);
					return;
				case 'links':
					$this->links = new Links();
					$this->links->jsonDeserialize($value);
					return;
			}
			parent::setJsonData($name, $value);
		}
	}
}