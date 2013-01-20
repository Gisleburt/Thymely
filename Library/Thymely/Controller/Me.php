<?php

	namespace Thymely\Controller;

	/**
	 * Index controller
	 */
	class Me extends ControllerAbstract {


		public function indexAction() {

			if($this->post()) {
				$validator = new \Gisleburt\Validator\MinLength(2);
				$email = $this->post('email');
				if($email && $email == $this->login->user->email) {

				}

				if($this->post('email') && $this->login->user->email != $this->post('email')) {

				}
			}

		}

		public function passwordAction() {
			$password1 = $this->getParam('password1');
			$password2 = $this->getParam('password2');

			if($password1 && $password2 && $password1 === $password2) {

			}

		}

	}