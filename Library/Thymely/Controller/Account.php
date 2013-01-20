<?php

	namespace Thymely\Controller;

	/**
	 * Index controller
	 */
	class Account extends ControllerAbstract {


		public function indexAction() {

		}

		public function passwordAction() {
			$password1 = $this->getParam('password1');
			$password2 = $this->getParam('password2');

			if($password1 && $password2 && $password1 === $password2) {

			}

		}

	}