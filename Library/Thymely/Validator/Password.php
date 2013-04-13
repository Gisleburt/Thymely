<?php

	namespace Thymely\Validator;

	use \Gisleburt\Validator\Validator;
	use \Gisleburt\Validator\MinLength;

	/**
	 * Checks that a password matches an acceptable format
	 * @package Thymely\Validator
	 */
	class Password extends Validator
	{

		protected $passwordLength = 8;

		public function __construct() {
			$minLengthValidator = new MinLength(array(
				'minLength' => $this->passwordLength
			));
			parent::__construct(
				array(
					$minLengthValidator,
				)
			);
			$this->setRequired();
		}

		public function test($value) {
			return true;
		}

	}
