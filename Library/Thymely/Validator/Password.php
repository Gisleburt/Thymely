<?php

	namespace Thymely\Validator;

	use \Gisleburt\Validator\Validator;
	use \Gisleburt\Validator\MinLength;

	class Password extends Validator
	{

		protected $passwordLength = 8;

		public function __construct() {
			$minLengthValidator = new MinLength($this->passwordLength);
			$minLengthValidator->setRequired();
			parent::__construct(
				array(
					$minLengthValidator,
				)
			);
		}

	}
