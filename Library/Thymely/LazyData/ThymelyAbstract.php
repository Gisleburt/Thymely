<?php
	namespace Thymely\LazyData;

	use Gisleburt\LazyData\LazyData;

	/**
	 * LazyData Database Class
	 */
	abstract class ThymelyAbstract extends LazyData  {

		protected $_host = 'localhost';
		protected $_username = 'dummyuser';
		protected $_password = 'dummypassword';
		protected $_schema = 'thymely';

	}