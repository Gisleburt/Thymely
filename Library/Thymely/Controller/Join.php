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

		public function indexAction() {

			$form = new UserDetails();

			if($form->wasReceived() && $form->isValid()) {

			}

			$this->view->form = $form;
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