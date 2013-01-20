<?php

	namespace Thymely\Controller;

	/**
	 * Index controller
	 */
	class Login extends ControllerAbstract {

		const DEFAULT_POST_LOGIN_PAGE = '/';

		protected $requiresLogin = false;


		/**
		 * Shows the login page. Can detect if it was requested or not
		 */
		public function indexAction() {

			$loginRequired = (strtolower($this->router->getRequestedController()) != 'login');

			// Are we attempting to login now
			if($this->getParam('email')) {
				$email    = $this->getParam('email');
				$password = $this->getParam('password');

				$this->login->login($email, $password);


				if($this->login->isLoggedIn()) {
					if($loginRequired)
						$this->router->redirect();
					else
						$this->router->redirect("/");
				}

				$this->router->redirect("/login/error");

			}

			// Show the login page
			$this->view->loginRequired = $loginRequired;
			$this->view->error = (strtolower($this->actionAttempted) == 'error');
		}

	}