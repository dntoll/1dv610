<?php

namespace View;

class HelloView {
	private static $TEXT_FIELD_ID = "name";
	private $user;

	private $nameWasTooShort = false;


	public function __construct(\Model\User $toBeViewed) {
		$this->user = $toBeViewed;
	}

	public function userWantsToChangeName() : bool {
		return isset($_GET[self::$TEXT_FIELD_ID]);
	}

	public function getUserName() : string {
		return trim($_GET[self::$TEXT_FIELD_ID]);	
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

	private function getInputValue() : string {
		if ($this->userWantsToChangeName()) {
			$inputValue = $this->getUserName();
			return htmlentities($inputValue);
		}
		return "";
	}

	private function getFormHTML() : string {
		$filteredInput = $this->getInputValue();
		return "<form method='get'>
						<input  type='text' name='" . self::$TEXT_FIELD_ID . "' value='" . $filteredInput . "'></input>
						<input type='submit'>
					</form>";
	}
}