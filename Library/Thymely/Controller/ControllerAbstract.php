<?php

	namespace Thymely\Controller;
	use \Gisleburt\Tools\Session;
	use \Gisleburt\Tools\Controller;

	/**
	 * ControllerAbstract for Thymely
	 */
	abstract class ControllerAbstract extends Controller
	{

		/**
		 * Is a logged in user required to view this page
		 * @var bool default true
		 */
		protected $requiresLogin = true;

		/**
		 * Session shared with all controllers
		 * @var Session
		 */
		protected $globalSession;

		/**
		 * Session available to just this controller;
		 * @var Session
		 */
		protected $localSession;

		public function __construct(array $uriParameters) {
			global $login;
			$this->login = $login;
			parent::__construct($uriParameters);
			$this->globalSession = Session::getSession(__class__);
			$this->localSession  = Session::getSession(get_called_class());
		}

		public function callAction($action) {
			// If the controller requires a logged in user but there isn't one, redirect to the login page.
			if($this->requiresLogin
					&& (!($this->login instanceof \Thymely\Tools\Login
					    && $this->login->isLoggedIn()))) {
				$this->router->loadController('index','login');
			}
			else {
				parent::callAction($action);
			}
		}
	}
