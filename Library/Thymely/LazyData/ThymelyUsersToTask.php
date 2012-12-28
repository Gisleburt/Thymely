<?php 

	namespace Thymely\LazyData;

	/**
	 * LazyData class
	 */
	class ThymelyUsersToTask extends ThymelyAbstract {
	
		/**
		 * The table this LazyData object represents
		 * @var string
		 */
		protected $_table = 'thymely_users_to_tasks';
	
		
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
		 * Task Id 
		 * @var long 
		 */
		public $task_id;

		
		/**
		 * Role Id 
		 * @var long 
		 */
		public $role_id;

		
	}
