<?php


require_once("Model/UserName.php");
require_once("Model/UserStorage.php");
require_once("Controller/SayHello.php");
require_once("View/HelloView.php");
require_once("View/HTMLPageView.php");



class Application {
	private $storage;
	private $controller;
	private $user; 
	private $view; 

	public function __construct() {
		$this->storage = new \Model\UserStorage();
		$this->user = $this->storage->loadUser();

		$this->view = new \View\HelloView($this->user);
		$this->controller = new \Controller\SayHello($this->user, $this->view);
	}

	public function run() {
		$this->changeState();
		$this->generateOutput();
	}

	private function changeState() {
		$this->controller->doChangeUserName();
		$this->storage->saveUser($this->user);
	}

	private function generateOutput() {
		$body = $this->view->getBody();
		$title = $this->view->getTitle();

		$pageView = new \View\HTMLPageView($title, $body);
		$pageView->echoHTML();
	}

}