<?php

	namespace Thymely\Controller;

	/**
	 * Index controller
	 */
	class Index extends ControllerAbstract {

		public function indexAction() {

			global $login;

			$this->view->isLoggedIn = $login->isLoggedIn();

		}

	}