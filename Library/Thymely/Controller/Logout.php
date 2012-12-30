<?php

	namespace Thymely\Controller;

	/**
	 * Index controller
	 */
	class Logout extends ControllerAbstract {

		protected $requiresLogin = false;

		/**
		 * Shows the login page. Can detect if it was requested or not
		 */
		public function indexAction() {

			global $login;
			$login->logout();
			$this->view->isLoggedIn = false;

		}

	}