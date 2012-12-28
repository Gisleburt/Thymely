<?php 

	namespace Thymely\LazyData;

	/**
	 * LazyData class
	 */
	class ThymelyRole extends ThymelyAbstract {
	
		/**
		 * The table this LazyData object represents
		 * @var string
		 */
		protected $_table = 'thymely_roles';
	
		
		/**
		 * Role Id 
		 * @var long 
		 */
		public $role_id;

		
		/**
		 * Name 
		 * @var string 
		 */
		public $name;

		
	}
