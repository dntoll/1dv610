<?php

namespace Controller;




class SayHello {

	private $view;
	private $user;

	public function __construct(\Model\User $user) {
		$this->user = $user;
		$this->view = new \View\HelloView($this->user);
		
	}

	public function doHello() : string {
		if ($this->view->userWantsToSayHello()) {
			$name = $this->view->getUserName();
			$this->user->setName($name);
		}

		return $this->view->show();
	}
}