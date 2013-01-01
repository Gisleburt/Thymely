<?php

	namespace Thymely\Tools;

	use \Thymely\LazyData\ThymelyUser;
	use \Gisleburt\Tools\Session;

	/**
	 * Stores information about a login
	 */
	class Login extends Session
	{
		/**
		 * @var ThymelyUser
		 */
		public $user;

		/**
		 * Gets the login object
		 * @return Login
		 */
		public static function getLogin() {
			return self::getSession();
		}

		/**
		 * Logs a user in
		 * @param $email string
		 * @param $password string
		 * @return bool
		 */
		public function login($email, $password) {

			$user = ThymelyUser::login($email, $password);
			if($user) {
				$user->unsetPdo();
				$login = self::getLogin();
				$login->user = $user;
				return true;
			}
			return false;

		}

		/**
		 * Checks to see if a user is logged in
		 * @return bool
		 */
		public function isLoggedIn() {
			return ($this->user && $this->user instanceof ThymelyUser && $this->user->user_id > 0);
		}


		/**
		 * Destroys the login object
		 */
		public function logout() {
			$this->user = null;
			$this->clearSession();
		}

	}
