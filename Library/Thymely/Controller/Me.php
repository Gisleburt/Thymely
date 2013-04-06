<?php

	namespace Thymely\Controller;

	use Thymely\Form\Password;
	use Thymely\Form\UserDetails;

	/**
	 * Index controller
	 */
	class Me extends ControllerAbstract {


		public function indexAction() {

			$form = new UserDetails(['user' => $this->login->user]);

			if($form->wasReceived() && $form->isValid()) {

				$tempUser = new ThymelyUser();
				if($this->login->user->checkPassword($form->getValue('email'))
						&& $tempUser->loadBy('email', $form->getValue('email'))) {
					$form->setError('email', 'This email is already registered.');
				}
				else {

					$this->login->user->setValues($form->getValues());

				}
			}

			$this->view->form = $form;

		}

		/**
		 * Allows the user to change their password
		 */
		public function passwordAction() {

			$form = new Password();

			if($form->wasReceived() && $form->isValid()) {
				var_dump($form->getValue('password'));
				var_dump($form->getValue('password2'));
			}

			$this->view->form = $form;

		}

	}