<?php 

	namespace Thymely\LazyData;

	use \Gisleburt\Tools\Tools;

	/**
	 * LazyData class
	 */
	class ThymelyUser extends ThymelyAbstract {
	
		/**
		 * The table this LazyData object represents
		 * @var string
		 */
		protected $_table = 'thymely_users';
	
		
		/**
		 * User Id 
		 * @var long 
		 */
		public $user_id;

		
		/**
		 * Email 
		 * @var string 
		 */
		public $email;

		
		/**
		 * Password 
		 * @var string 
		 */
		protected $password;

		
		/**
		 * Salt 
		 * @var string 
		 */
		protected $salt;

		
		/**
		 * Firstname 
		 * @var string 
		 */
		public $firstname;

		
		/**
		 * Lastname 
		 * @var string 
		 */
		public $lastname;

		
		/**
		 * Date Created 
		 * @var string 
		 */
		public $date_created;

		
		/**
		 * Date Modified 
		 * @var string 
		 */
		public $date_modified;

		
		/**
		 * Date Deleted 
		 * @var string 
		 */
		public $date_deleted;


		/**
		 * Hash the given password
		 * @param $password
		 * @return string
		 */
		protected function hashPassword($password) {

			global $config;

			if(!$this->salt) {
				$this->salt = Tools::randomAscii(32);
			}

			$siteKey = $config->getSiteKey();
			$hashedPassword = $password;
			$salt = $this->salt;

			$nHashes = 1000;
			for($i = 0; $i < $nHashes; $i++)
				$hashedPassword = hash_hmac('sha256', $hashedPassword.$salt, $siteKey);

			return $hashedPassword;

		}

		/**
		 * Checks the given password is correct for this user
		 * @param $password
		 * @return bool
		 */
		public function checkPassword($password) {
			return ($password
			        && $this->password
					&& $this->password === $this->hashPassword($password));
		}

		/**
		 * This is used to allow the user object to be stored in session
		 */
		public function unsetPdo() {
			unset($this->_pdo);
		}

		/**
		 * Set a new password
		 * @param $password
		 */
		public function setPassword($password) {
			$this->salt = Tools::randomAscii(32);
			$this->password = $this->hashPassword($password);
		}

	}
