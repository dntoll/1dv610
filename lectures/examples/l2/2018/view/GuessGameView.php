<?php

namespace view;

class GuessGameView {
	private static $GUESS_NUMBER_INDEX = "guess";

	private $gameManager;


	public function __construct(\model\GameManager $toBeViewed) {
		$this->gameManager = $toBeViewed;
	}

	public function playerHasGuess() : bool {
		return isset($_GET[self::$GUESS_NUMBER_INDEX]);
	}

	public function getGuessedNumber() : \model\GuessedNumber {

		$rawData = $_GET[self::$GUESS_NUMBER_INDEX];
		$filtered = trim($rawData);

		return new \model\GuessedNumber($filtered);
	}

	public function getGameHTML() : string {
		$ret = "<h2>Gissa numret!</h2>";

		$ret .= "
		<form>
			<input type='text' name='" . self::$GUESS_NUMBER_INDEX. "'/>
			<input type='submit' />
		</form>";

		$ret .= $this->showGuessResult();
		$ret .= $this->showNumberOfGuesses();
		return $ret;
	}

	private function showGuessResult() : string {

		
		if ($this->gameManager->lastGuessWasCorrect()) {
			$correct = $this->gameManager->getCorrectAnswer();
			return "Grattis du har gissat rätt. Rätt svar var $correct";
		}
		else 
		{
			if ($this->gameManager->lastGuessWasToLow()) 
				return "Felaktig gissning, det ska vara ett större tal";
			else
				return "Felaktig gissning, det ska vara ett mindre tal";
		}
	}

	private function showNumberOfGuesses() : string {
		
	}
}