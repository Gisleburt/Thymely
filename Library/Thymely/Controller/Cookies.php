<?php

	namespace Thymely\Controller;

	/**
	 * Index controller
	 */
	class Cookies extends RestAbstract {

		protected $requiresLogin = false;

		protected $requiresCookies = false;

		public function indexAction() {

		}

		public function postIndexAction() {
			if($this->getParam('allowCookies') == 1) {
				$this->allowCookies();
				$this->router->redirect();
			}
			else {
				$this->router->redirect("/");
			}
		}

	}