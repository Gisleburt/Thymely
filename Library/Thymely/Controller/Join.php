<?php

	namespace Thymely\Controller;

	use \Thymely\LazyData\ThymelyUser;
	use \Gisleburt\Tools\Tools;

	/**
	 * Index controller
	 */
	class Join extends RestAbstract {

		protected $requiresLogin = false;

		protected $requiresCookies = false;

		public function indexAction() {
			if($this->_getParam('join')) {
				$email     = $this->_getParam('email');
				$firstname = $this->_getParam('firstname');
				$lastname  = $this->_getParam('lastname');
				$error = '';

				$user = new ThymelyUser();

				if(!($email && $firstname && $lastname)) {
					$error = 'All fields are required';
				}
				if(!$error && $user->loadBy('email', $email)) {
					$this->view->error = 'That email is already in use';
				}
				else {
					$user->email     = $email;
					$user->firstname = $firstname;
					$user->lastname  = $lastname;
					$user->setPassword(Tools::randomAscii(8));
					$user->save();
				}

				$this->view->email     = $email;
				$this->view->firstname = $firstname;
				$this->view->lastname  = $lastname;
			}
		}

		public function postIndexAction() {


		}

	}