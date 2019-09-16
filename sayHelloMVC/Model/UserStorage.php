<?php

namespace Model;

session_start();

class UserStorage {

	private static $SESSION_KEY =  __CLASS__ .  "::UserName";

	public function loadUser() {
		if (isset($_SESSION[self::$SESSION_KEY])) {
			return $_SESSION[self::$SESSION_KEY];
		} else {
			return new UserName("default");
		}
	}

	public function saveUser(UserName $toBeSaved) {
		$_SESSION[self::$SESSION_KEY] = $toBeSaved;
	}
}