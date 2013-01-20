<?php

	namespace Thymely\Controller;

	use \Thymely\LazyData\ThymelyUser;
	use \Gisleburt\Tools\Tools;
	use \Gisleburt\Validator\Validator;
	use \Gisleburt\Validator\Email;
	use \Thymely\Validator\Password;

	/**
	 * Index controller
	 */
	class Join extends ControllerAbstract {

		protected $requiresLogin = false;

		protected $requiresCookies = false;

		public function indexAction() {

			if($this->getParam('join')) {

				$email     = $this->getParam('email');
				$firstname = $this->getParam('firstname');
				$lastname  = $this->getParam('lastname');
				$password  = $this->getParam('password');


				$validator = new Validator();
				$validator->setRequired();

				$validator->validate($firstname);
				$this->view->firstnameError = $validator->getError();

				$validator->validate($lastname);
				$this->view->lastnameError = $validator->getError();

				$validator->setValidator(new Email());
				$validator->validate($email);
				$this->view->emailError = $validator->getError();

				$validator = new Validator(new Password());
				$validator->setRequired();
				$validator->validate($password);
				$this->view->passwordError = $validator->getError();

				if(!$validator->hasRecordedError()) {
					$user = new ThymelyUser();
					if($user->loadBy('email', $email)) {
						$this->view->emailError = 'That email is already in use';
					}
					else {
						$user->email     = $email;
						$user->firstname = $firstname;
						$user->lastname  = $lastname;
						$user->setPassword($password);
						$user->status    = ThymelyUser::STATUS_INACTIVE;
						$user->save();
						$this->welcome = true;
						$this->callAction('welcome');
					}
				}

				$this->view->email     = $email;
				$this->view->firstname = $firstname;
				$this->view->lastname  = $lastname;
			}

		}

		public function welcomeAction() {
			if(!$this->welcome)
				$this->callAction('index');
		}

		public function activateAction() {
			$users = ThymelyUser::getBy('status', ThymelyUser::STATUS_ACTIVATE);
			foreach($users as $user) {
				/* @var $user ThymelyUser */
				echo "$user->firstname $user->lastname - $user->email<br />";
				$user->activate();
			}
			$user = new ThymelyUser(1);
			$user->activate();
			die;
		}

	}