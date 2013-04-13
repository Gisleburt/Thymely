<?php

	namespace Thymely\Validator;

	use \Gisleburt\Validator\Validator;
	use \Thymely\LazyData\ThymelyUser;

	class PasswordMatch extends Validator
	{

		const ERROR_INVALID = 'This does not match your current password';

		/**
		 * @var \Thymely\LazyData\ThymelyUser
		 */
		protected $user;

		public function test($value) {
			if(!$valid = $this->user->checkPassword($value))
				$this->error = self::ERROR_INVALID;
			return $valid;
		}


	}
