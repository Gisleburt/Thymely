<?php
	/**
	 * User details
	 * @author Daniel Mason
	 */

	namespace Thymely\Form;

	use Gisleburt\Form\Element;
	use Thymely\LazyData\ThymelyUser;

	class UserDetails extends Form {

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
					'name' => 'firstname',
					'value' => $this->user->firstname,
					'required' => true,
				]),

				new Element([
					'name' => 'lastname',
					'value' => $this->user->lastname,
					'required' => true,
				]),

				new Element([
					'name' => 'email',
					'value' => $this->user->email,
					'required' => true,
				]),
				
			]);

		}


	}