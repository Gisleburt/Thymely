<?php
	/**
	 * User details
	 * @author Daniel Mason
	 */

	namespace Thymely\Form;

	use Gisleburt\Form\Element;
	use Thymely\LazyData\ThymelyUser;

	class Login extends Form {

		/**
		 * @var ThymelyUser
		 */
		public $user;

		public function generate() {

			if(!$this->user)
				$this->user = new ThymelyUser();

			$this->addElements([

				new Element([
					'name' => 'formName',
					'value' => __CLASS__
				]),

				new Element([
					'name' => 'email',
					'value' => $this->user->email,
					'required' => true,
				]),

				new Element([
					'name' => 'password',
					'value' => '',
					'required' => true,
					'type' => 'password',
				]),
				
			]);

		}


	}