<?php

	namespace Thymely\Controller;

	/**
	 * Index controller
	 */
	class Me extends ControllerAbstract {


		public function indexAction() {

		}

		public function passwordAction() {

			$passwordForm = new \Thymely\Form\Password();
			$passwordForm->generate();
			$this->view->passwordForm = $passwordForm;

		}

	}