<?php
	/**
	 * User details
	 * @author Daniel Mason
	 */

	namespace Thymely\Form;

	use Gisleburt\Form\Element;
	use Gisleburt\Validator\MatchElement;
	use Thymely\Validator\PasswordMatch;
	use Thymely\LazyData\ThymelyUser;
	use Thymely\Tools\Login;

	class Password extends Form {

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
					'name' => 'oldPassword',
					'value' => '',
					'required' => true,
					'type' => 'password',
					'validator' => new PasswordMatch(array(
						'user' => Login::getLogin()->user
					)),
				]),

				new Element([
					'name' => 'newPassword',
					'value' => '',
					'required' => true,
					'type' => 'password',
					'validator' => new \Thymely\Validator\Password(),
				]),

				new Element([
					'name' => 'newPassword2',
					'value' => '',
					'required' => true,
					'type' => 'password',
				]),
				
			]);


			// Here's the magic!
			$this->getElement('newPassword2')->addValidator(
				new MatchElement(array(
					'element' => $this->getElement('newPassword')
				))
			);

		}


	}