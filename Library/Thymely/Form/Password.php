<?php

	namespace Thymely\Form;

	use \Zend\Validator\StringLength;

	class Password extends FormAbstract
	{

		public function generate() {

			$this->setAttribute('method', 'post');

			$this->add(array(
				'name' => 'password1',
				'attributes' => array(
					'type'  => 'password',
				),
			));

			$this->add(array(
				'name' => 'password2',
				'attributes' => array(
					'type'  => 'password',
				),
			));

			$this->add(array(
				'name' => 'submit',
				'attributes' => array(
					'type'  => 'submit',
					'value' => 'Change!',
				),
			));

		}

	}
