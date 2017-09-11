<?php


namespace model;

class SecretNumber {
	private static $SECRET_SESSION_ID = "model::SecretNumber::secret";
	private $secret;

	public function __construct() {
		assert(session_status() != PHP_SESSION_NONE);
		
		if ($this->weDontHaveASecret()) {
			$this->generateSecret();
		
		}
		$this->secret = $this->getSavedNumber();
	}

	public function getSecret() : int {
		return $this->secret;
	}

	public function isHigher(GuessedNumber $guess) : bool {
		if ($this->getSecret() > $guess->getGuess())
			return true;
		return false;
	}

	private function weDontHaveASecret() : bool{
		return isset ($_SESSION[self::$SECRET_SESSION_ID]) == false;
	}

	private function generateSecret() {
		$_SESSION[self::$SECRET_SESSION_ID] = rand() % GuessedNumber::$MAX_GUESS;

	}

	private function getSavedNumber() {
		return $_SESSION[self::$SECRET_SESSION_ID];
	}
}