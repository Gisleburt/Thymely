<?php 

	namespace Thymely\LazyData;

	/**
	 * LazyData class
	 */
	class ThymelyGroupsToTask extends ThymelyAbstract {
	
		/**
		 * The table this LazyData object represents
		 * @var string
		 */
		protected $_table = 'thymely_groups_to_tasks';
	
		
		/**
		 * Info Id 
		 * @var long 
		 */
		public $info_id;

		
		/**
		 * Group Id 
		 * @var long 
		 */
		public $group_id;

		
		/**
		 * Task Id 
		 * @var long 
		 */
		public $task_id;

		
		/**
		 * Permission Id 
		 * @var long 
		 */
		public $permission_id;

		
	}
