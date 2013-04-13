<?php

	namespace Thymely\Controller;
	use \Thymely\Tools\Login;
	use \Gisleburt\Tools\Session;
	use \Gisleburt\Tools\Controller;

	/**
	 * ControllerAbstract for Thymely
	 */
	abstract class ControllerAbstract extends Controller
	{

		/**
		 * Prevent cookies being used when not required
		 * @var bool default true
		 */
		protected $requiresCookies = true;

		/**
		 * Has the user agreed to allow cookies
		 * @var bool
		 */
		protected $cookiesAccepted = false;

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

			parent::__construct($uriParameters);

			$this->view->isLoggedIn = false;
			if($this->allowingCookies()) {
				$this->login = Login::getLogin();
				$this->view->login = $this->login;
				$this->view->isLoggedIn = $this->login->isLoggedIn();
				$this->globalSession = Session::getSession(__class__);
				$this->localSession  = Session::getSession(get_called_class());
			}

		}

		public function callAction($action) {
			if(($this->requiresCookies || $this->requiresLogin)
				&& !$this->allowingCookies()) {
				$this->router->loadController('index','cookies');
			}
			elseif($this->requiresLogin
					&& !$this->isLoggedIn()) {
				$this->router->loadController('index','login');
			}
			else {
				parent::callAction($action);
			}
		}

		/**
		 * Can we use cookies?
		 * @return bool
		 */
		public function allowingCookies() {
			return array_key_exists('acceptingCookies', $_COOKIE) && $_COOKIE['acceptingCookies'];
		}

		/**
		 * Turn on cookies
		 */
		public function allowCookies() {

			setcookie(
				'acceptingCookies',
				'1',
				time() + 60*60*24*30,
				'/',
				$_SERVER['HTTP_HOST']
			);
		}

		/**
		 * Wrapper for checking login
		 */
		public function isLoggedIn() {
			return (
				isset($this->login)
				&& $this->login instanceof Login
				&& $this->login->isLoggedIn()
			);
		}
	}
