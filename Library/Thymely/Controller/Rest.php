<?php

namespace Thymely\Controller;

	/**
	 * Controller for REST API
	 */
	class Rest extends RestAbstract
	{

		public function indexAction() {

		}

		//
		// Tasks
		//

		public function getTaskAction() {
			$task_id = $this->getParam('task_id');
		}

		public function postTaskAction() {

		}

		public function putTaskAction() {

		}

	}
