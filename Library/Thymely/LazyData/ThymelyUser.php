<?php 

	namespace Thymely\LazyData;

	/**
	 * LazyData class
	 */
	class ThymelyUser extends ThymelyAbstract {
		
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
		public $password;

		
		/**
		 * Salt 
		 * @var string 
		 */
		public $salt;

		
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

		
	}
