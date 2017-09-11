<?php

namespace view;

require_once("GuessedNumber.php");



class GuessNumberView {
	private static $FORM_GUESS_NUMBER = "view::GuessNumberView::guess";

	public function __construct() {

	}

	public function showFormAndTitle() {
		echo "<h1>Gissa Numret!</h1>";

		echo "
		<form method='post'>
			<input type=\"text\" name='" . self::$FORM_GUESS_NUMBER ."'/>
			<input type='submit' value='Gissa!'/>
		</form>";

	}

	public function showGuess() {
		echo "Du gissade : " . $this->getGuessedNumber() . ". ";
	}

	public function getGuessedNumber() : \model\GuessedNumber {
		if (isset($_REQUEST[self::$FORM_GUESS_NUMBER])) {
			$ret = $_REQUEST[self::$FORM_GUESS_NUMBER];
			return new \model\GuessedNumber($ret);
		}

		throw new \Exception("Not a valid guess");
	}

	public function showSuccess() {
		echo "Yess!!!";
	}

	public function showHint(\model\SecretNumber $secret) {
		if ($secret->isHigher($this->getGuessedNumber())) {
			echo "Mitt nummer är större!";
		} else {
			echo "Mitt nummer är mindre!";
		}
	}
}