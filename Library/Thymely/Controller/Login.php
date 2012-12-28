<?php

	namespace Thymely\Controller;

	/**
	 * Index controller
	 */
	class Login extends ControllerAbstract {

		public function indexAction() {

			$this->view->error = (strtolower($this->actionAttempted) == 'error');

		}

		public function loginAction() {

			global $login;

			$email    = $this->_getParam('email');
			$password = $this->_getParam('password');

			$login->login($email, $password);

			global $router;
			if($login->isLoggedIn())
				$this->router->redirect("/");
			else
				$this->router->redirect("/login?error");

		}

		public function logoutAction() {
			global $login;
			$login->logout();
		}

	}