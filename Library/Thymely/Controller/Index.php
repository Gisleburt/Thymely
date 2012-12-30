<?php

	namespace Thymely\Controller;

	/**
	 * Index controller
	 */
	class Index extends ControllerAbstract {

		protected $requiresLogin = false;

		public function indexAction() {

			global $login;

			$this->view->isLoggedIn = $login->isLoggedIn();

		}

	}