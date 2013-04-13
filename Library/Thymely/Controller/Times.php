<?php

	namespace Thymely\Controller;


	use Thymely\Form\Time;
	use Thymely\LazyData\ThymelyTask;
	use Thymely\LazyData\ThymelyTime;

	/**
	 * Index controller
	 */
	class Times extends ControllerAbstract {

		public function indexAction() {

			$fromDate = date('Y-m-d 00:00:00', strtotime('today'));
			$times = ThymelyTime::getWhere("date_started >= '$fromDate'");

			$form = new Time();

			if($form->wasReceived() && $form->isValid()) {
				$task = new ThymelyTask();
				$task->loadWhere("name = '{$form->getElement('name')}' and owner_id = {$this->login->user->getPrimaryKey}");
				if(!$task->getPrimaryKey()) {
					$task->name = $form->getElement('taskName');
					$task->owner_id = $this->login->user->getPrimaryKey();
					$task->save();
					$time = new ThymelyTime();
					$time->task_id = $task->getPrimaryKey();
					$time->date_started = date('y-m-d H:i:s');
				}
			}

			$this->view->times = $times;

		}

	}