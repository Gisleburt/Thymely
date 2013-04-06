<?php

	namespace Thymely\Controller;

	use Thymely\Form\UserDetails;
	use \Thymely\LazyData\ThymelyUser;
	use \Gisleburt\Tools\Tools;
	use \Gisleburt\Validator\Validator;

	/**
	 * Index controller
	 */
	class Join extends ControllerAbstract {

		protected $requiresLogin = false;

		protected $requiresCookies = false;

		/**
		 * Used to prevent people inadvertantly going to the welcome screen
		 * @var bool
		 */
		protected $welcome = false;

		public function indexAction() {

			$form = new UserDetails();

			if($form->wasReceived() && $form->isValid()) {

				$user = new ThymelyUser();
				if($user->loadBy('email', $form->getValue('email'))) {
					$form->setError('email', 'This email is already registered.');
				}
				else {
					// TODO: THIS MUST BE FIXED ASAP!!!
					$password = 'password';
					$user->setValues($form->getValues());
					$user->setPassword($password);
					$user->status = ThymelyUser::STATUS_INACTIVE;
					$user->save();
					$this->welcome = true;
					$this->callAction('welcome');
				}
			}

			$this->view->form = $form;
		}

		public function welcomeAction() {
			if(!$this->welcome)
				$this->callAction('index');
		}

		public function activateAction() {
			/* @var $users ThymelyUser[] */
			$users = ThymelyUser::getBy('status', ThymelyUser::STATUS_ACTIVATE);
			var_dump($users);
			foreach($users as $user) {
				echo "$user->firstname $user->lastname - $user->email<br />";
				$user->activate();
			}
			die;
		}

	}