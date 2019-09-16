<?php

namespace View;

class HelloView {
	private static $TEXT_FIELD_ID = "name";
	private $user;

	private $nameWasTooShort = false;


	public function __construct(\Model\UserName $toBeViewed) {
		$this->user = $toBeViewed;
	}

	public function userWantsToChangeName() : bool {
		return isset($_GET[self::$TEXT_FIELD_ID]);
	}

	public function getUserName() : \Model\UserName {
		return new \Model\UserName($this->getInputValueFiltered());	
	}


	public function setNameWasTooShort() {
		$this->nameWasTooShort = true;
	}

	public function getTitle() : string {
		if ($this->user->hasUserName()) {
			return $this->user->getUserName();
		}

		return "name needed";

	}

	public function getBody() : string {

		$ret = "";

		$ret .= $this->generateHeaderWithName();
		$ret .= $this->getMessages();
		$ret .= $this->getFormHTML();

		return $ret;
	}


	private function generateHeaderWithName() : string {
		if ($this->user->hasUserName()) {
			$name = $this->user->getUserName();
			return "<h1>Hello $name</h1>";
		}
		return "";
	}

	private function getMessages() : string {
		if ($this->nameWasTooShort) {
			return "<p>Name must be longer...</p>";	
		}
		return "";
	}

	private function getInputValueFiltered() : string {
		if ($this->userWantsToChangeName()) {
			$inputValue = $_GET[self::$TEXT_FIELD_ID];
			return \Model\UserName::applyFilter($inputValue);
		}
		return "";
	}

	private function getFormHTML() : string {
		$filteredInput = $this->getInputValueFiltered();
		return "<form method='get'>
						<input  type='text' name='" . self::$TEXT_FIELD_ID . "' value='" . $filteredInput . "'></input>
						<input type='submit'>
					</form>";
	}
}