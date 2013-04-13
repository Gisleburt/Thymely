<?php
	/**
	 * User details
	 * @author Daniel Mason
	 */

	namespace Thymely\Form;

	use Gisleburt\Form\Element;
	use Thymely\LazyData\ThymelyUser;

	class Time extends Form {

		public function generate() {


			$this->addElements(array(

				new Element(array(
					'name' => 'formName',
					'value' => __CLASS__
				)),

				new Element(array(
					'name' => 'taskName',
					'required' => true,
				)),
				
			));

		}

	}