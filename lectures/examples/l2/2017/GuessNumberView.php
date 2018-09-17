<?php

namespace view;

require_once("GuessedNumber.php");



class GuessNumberView {
	private static $FORM_GUESS_NUMBER = "view::GuessNumberView::guess";

	private $secret;

	public function __construct(\model\SecretNumber $secret) {
		$this->secret = $secret;
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

	public function userHasGuessed() : bool {
		return isset($_REQUEST[self::$FORM_GUESS_NUMBER]);
	}

	public function getGuessedNumber() : \model\GuessedNumber {
		//Warning: must only be called if userHasGuessed returns true;
		$ret = $_REQUEST[self::$FORM_GUESS_NUMBER];
		return new \model\GuessedNumber($ret);
	}

	public function showSuccess() {
		echo "Yess!!!";
	}

	public function showHint() {
		if ($this->secret->isHigher($this->getGuessedNumber())) {
			echo "Mitt nummer är större!";
		} else {
			echo "Mitt nummer är mindre!";
		}
	}

	public function showNotANumberError() {
		echo "Du måste mata in ett nummer! ";
	}

	public function showNotInRangeError() {
		//TODO Magiska nummer från modellen!!!
		echo "Du måste mata in ett nummer mellan " . \model\GuessedNumber::$MIN_GUESS . " - " . \model\GuessedNumber::$MAX_GUESS. "! ";
	}
}