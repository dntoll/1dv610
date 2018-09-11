<?php

namespace View;

class HelloView {
	private static $TEXT_FIELD_ID = "name";
	private $user;


	public function __construct(\Model\User $toBeViewed) {
		$this->user = $toBeViewed;
	}

	public function userWantsToSayHello() : bool {
		return isset($_GET[self::$TEXT_FIELD_ID]);
	}

	public function getUserName() : string {
		return $_GET[self::$TEXT_FIELD_ID];	
	}


	public function show() : string {

		$ret = "";

		if ($this->user->hasUserName()) {
			$name = $this->user->getUserName();
			$ret .= "<h1>Hello $name</h1>";
		}
		return $ret . "<form method='get'>
						<input  type='text' name='" . self::$TEXT_FIELD_ID . "'></input>
						<input type='submit'>
					</form>";
		

	}
}