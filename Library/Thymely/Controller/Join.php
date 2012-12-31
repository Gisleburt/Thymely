<?php

	namespace Thymely\Controller;

	/**
	 * Index controller
	 */
	class Join extends RestAbstract {

		protected $requiresLogin = false;

		public function indexAction() {

		}

		public function postIndexAction() {

			$email     = $this->_getParam('email');
			$firstname = $this->_getParam('firstname');
			$lastname  = $this->_getParam('lastname');


		}

	}