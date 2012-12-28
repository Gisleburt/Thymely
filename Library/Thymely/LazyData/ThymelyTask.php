<?php 

	namespace Thymely\LazyData;

	/**
	 * LazyData class
	 */
	class ThymelyTask extends ThymelyAbstract {
	
		/**
		 * The table this LazyData object represents
		 * @var string
		 */
		protected $_table = 'thymely_tasks';
	
		
		/**
		 * Task Id 
		 * @var long 
		 */
		public $task_id;

		
		/**
		 * Owner Id 
		 * @var long 
		 */
		public $owner_id;

		
		/**
		 * Name 
		 * @var string 
		 */
		public $name;

		
		/**
		 * Description 
		 * @var string 
		 */
		public $description;

		
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
