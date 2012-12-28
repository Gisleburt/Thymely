<?php 

	namespace Thymely\LazyData;

	/**
	 * LazyData class
	 */
	class ThymelyTask extends ThymelyAbstract {
		
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
