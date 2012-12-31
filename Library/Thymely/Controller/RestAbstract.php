<?php

namespace Thymely\Controller;

	/**
	 * Controller for REST API
	 */
	class RestAbstract extends ControllerAbstract
	{

		public function callAction($action) {
			$action = strtolower($_SERVER['REQUEST_METHOD']).rtrim(ucfirst($action), 's');
			parent::callAction($action);
		}

	}
