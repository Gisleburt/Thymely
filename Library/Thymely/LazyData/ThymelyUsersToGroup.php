<?php 

	namespace Thymely\LazyData;

	/**
	 * LazyData class
	 */
	class ThymelyUsersToGroup extends ThymelyAbstract {
	
		/**
		 * The table this LazyData object represents
		 * @var string
		 */
		protected $_table = 'thymely_users_to_groups';
	
		
		/**
		 * Info Id 
		 * @var long 
		 */
		public $info_id;

		
		/**
		 * User Id 
		 * @var long 
		 */
		public $user_id;

		
		/**
		 * Group Id 
		 * @var long 
		 */
		public $group_id;

		
		/**
		 * Role Id 
		 * @var long 
		 */
		public $role_id;

		
	}
