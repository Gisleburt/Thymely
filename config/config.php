<?php
	
	class config {
		
		// Development
		public $devmode = true;
		
		// Directory Structure
		public $dir = array(
				'root'       => '',
				'data'       => 'data',
				'logs'       => 'data/logs',
				'templates'  => 'data/templates',
				'templatesC' => 'data/templates_c',
				'userfiles'  => 'data/userfiles',
				'library'    => 'Library',
			);
		
		// MySQL
		public $mysqlUser   = 'user';
		public $mysqlPass   = 'password';
		public $mysqlHost   = '127.0.0.1';
		public $mysqlSchema = 'thymely';
		
		// Errors
		public $errorFolder    = 'data/logs/errors';
		public $errorEmail     = 'daniel@danielmason.com';
		public $errorSubject   = 'Error on DanielMason.com';
		public $errorDbServer  = '127.0.0.1';
		public $errorDbUser    = 'user';
		public $errorDbPass    = 'password';
		public $errorDbSchema  = 'errors';
		public $errorDbTable   = 'errors';
		
		
		
		/**
		 * Create an setup the configuration details
		 */
		public function __construct() {
			// Lets make the paths absolute if they aren't already
			foreach($this->dir as $key => $dir)
				$this->dir[$key] = $this->makeAbsolute($dir);
			$this->errorFolder = $this->makeAbsolute($this->errorFolder);
		}
		
		/**
		 * Attempts to make a given directory absolute based on the assumption
		 * that this file is in /config relative to the application root
		 * @param string $dir
		 * @return string
		 */
		public function makeAbsolute($dir) {
			if(strpos($dir, '/') !== 0 && strpos($dir, ':') !== 1)
				$dir = dirname(__DIR__).'/'.$dir;
			return $dir;
		}
		
	}