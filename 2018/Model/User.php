<?php

namespace Model;

require_once("TooShortNameException.php");

class User {
	private static $minNameLength = 1;
	private $name = null;

	public function setName(string $newName)  {

		if (strlen($newName) > self::$minNameLength) {
			$this->name = $this->applyFilter($newName);
		} else {
			throw new TooShortNameException();
		}
	}

	public function getUserName() {
		return $this->name;
	}

	public function hasUserName() : bool {
		return $this->name != null;
	}

	private function applyFilter(string $rawInput) {
		return htmlentities($rawInput);	
	}
}