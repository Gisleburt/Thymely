<?php

	namespace Thymely\Controller;

	/**
	 * Index controller
	 */
	class Tasks extends ControllerAbstract {

		public function indexAction() {

			$user_id = (int)$this->login->user->user_id;
			$fromDate = date('Y-m-d 00:00:00', strtotime('last Sunday'));

			$this->view->tasks = \Thymely\LazyData\ThymelyTask::getWhere("user_id =  AND");

		}

	}