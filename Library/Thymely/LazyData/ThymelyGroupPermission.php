<?php 

	namespace Thymely\LazyData;

	/**
	 * LazyData class
	 */
	class ThymelyGroupPermission extends ThymelyAbstract {
	
		/**
		 * The table this LazyData object represents
		 * @var string
		 */
		protected $_table = 'thymely_group_permissions';
	
		
		/**
		 * Permission Id 
		 * @var long 
		 */
		public $permission_id;

		
		/**
		 * Name 
		 * @var string 
		 */
		public $name;

		
	}
