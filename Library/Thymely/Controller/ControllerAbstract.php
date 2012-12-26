<?php

	namespace Thymely\Controller;
	use \Gisleburt\Tools\Session;
	use \Gisleburt\Tools\Controller;

	/**
	 * ControllerAbstract for Thymely
	 */
	abstract class ControllerAbstract extends Controller
	{
		/**
		 * Session shared with all controllers
		 * @var Session
		 */
		protected $globalSession;

		/**
		 * Session available to just this controller;
		 * @var Session
		 */
		protected $localSession;

		public function __construct(array $uriParameters) {
			parent::__construct($uriParameters);
			$this->globalSession = Session::getSession(__class__);
			$this->localSession  = Session::getSession(get_called_class());
		}
	}
