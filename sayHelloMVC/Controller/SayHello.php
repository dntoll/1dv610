<?php

namespace Controller;




class SayHello {

	private $view;
	private $user;

	public function __construct(\Model\UserName $user, \View\HelloView $view) {
		$this->user = $user;
		$this->view = $view;
		
	}

	public function doChangeUserName()  {
		if ($this->view->userWantsToChangeName()) {
			try {
				$name = $this->view->getUserName();
				$this->user->setName($name);
			} catch (\Exception $e) {
				$this->view->setNameWasTooShort();
			}
		}
	}
}