<?php 

	namespace Thymely\LazyData;

	/**
	 * LazyData class
	 */
	class ThymelyUsersToUser extends ThymelyAbstract {
	
		/**
		 * The table this LazyData object represents
		 * @var string
		 */
		protected $_table = 'thymely_users_to_users';
	
		
		/**
		 * Info Id 
		 * @var long 
		 */
		public $info_id;

		
		/**
		 * From User 
		 * @var long 
		 */
		public $from_user;

		
		/**
		 * To User 
		 * @var long 
		 */
		public $to_user;

		
		/**
		 * Status 
		 * @var string 
		 */
		public $status;

		
	}
