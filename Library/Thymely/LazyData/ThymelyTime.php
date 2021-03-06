<?php 

	namespace Thymely\LazyData;

	/**
	 * LazyData class
	 */
	class ThymelyTime extends ThymelyAbstract {
	
		/**
		 * The table this LazyData object represents
		 * @var string
		 */
		protected $_table = 'thymely_times';
	
		
		/**
		 * Time Id 
		 * @var long 
		 */
		public $time_id;

		
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
		 * Date Started 
		 * @var string 
		 */
		public $date_started;

		
		/**
		 * Time 
		 * @var long 
		 */
		public $time;

		
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
