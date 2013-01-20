<?php

	namespace Thymely\Validator;

	use \Gisleburt\Validator\Validator;
	use \Gisleburt\Validator\MinLength;

	class Password extends Validator
	{

		protected $passwordLength = 8;

		protected $confirmPassword;

		public function __construct() {
			$minLengthValidator = new MinLength($this->passwordLength);
			$minLengthValidator->setRequired();
			parent::__construct(
				array(
					$minLengthValidator,
				)
			);
		}

		public function test($value) {


			parent::test($value);

		}

		public function setConfirmPassword($confirmPassword) {
			$this->confirmPassword = $confirmPassword;
		}

	}
