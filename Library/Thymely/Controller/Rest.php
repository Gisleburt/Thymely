<?php

namespace Thymely\Controller;

	/**
	 * Controller for REST API
	 */
	class Rest extends ControllerAbstract
	{

		public function callAction($action) {
			$action = strtolower($_SERVER['REQUEST_METHOD']).rtrim(ucfirst($action), 's');
			parent::callAction($action);
		}

		public function indexAction() {

		}

		//
		// Tasks
		//

		public function getTaskAction() {
			$task_id = $this->_getParam('task_id');
		}

		public function postTaskAction() {

		}

	}
