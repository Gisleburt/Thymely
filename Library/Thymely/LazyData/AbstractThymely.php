<?php

	namespace Thymely\LazyData;

	use Gisleburt\LazyData\LazyData;

	abstract class AbstractThymely extends LazyData  {
		
		protected $_host = '127.0.0.1';
		protected $_username = 'dummyuser';
		protected $_password = 'dummypassword';
		protected $_schema = 'thymely';
		
	}