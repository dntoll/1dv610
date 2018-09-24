<?php

namespace view;

class GuessGameView {
	//NOTE: its private so the string "guess" is a secret that only this class knows about
	private static $GUESS_NUMBER_INDEX = "guess";

	//NOTE: Read only access (from MVC)
	private $gameManager;

	public function __construct(\model\GameManager $toBeViewed) {
		$this->gameManager = $toBeViewed;
		$this->error = "";
	}

	public function playerHasGuess() : bool {
		return isset($_GET[self::$GUESS_NUMBER_INDEX]);
	}

	public function getGuessedNumber() : \model\GuessedNumber {
		assert($this->playerHasGuess());

		$rawData = $_GET[self::$GUESS_NUMBER_INDEX];
		$filtered = trim($rawData);

		if (is_numeric($filtered)) {
			$anInt = intval($filtered);
			return new \model\GuessedNumber($anInt);
		}

		$this->error = "Mata in ett tal!";

		throw new \Exception("Matat in något som inte är ett tal");
		
	}

	public function getGameHTML() : string {
		$a = $this->showGameInterface();

		if ($this->gameManager->hasGuessed()) {
			$b = $this->showGuessResult();
			$c = $this->showNumberOfGuesses();
			return $this->layout($a, $b, $c);
		}

		return $a;
		
	}

	private function layout(string $a, string $b, string $c) {
		return $a . $b . $c;
	}

	private function showGameInterface() : string {
		return "
		<h2>Gissa numret!</h2>
		<p>$this->error</p>
		<form>
			<input type='text' name='" . self::$GUESS_NUMBER_INDEX. "'/>
			<input type='submit' />
		</form>";
	}

	private function showGuessResult() : string {

		
		if ($this->gameManager->lastGuessWasCorrect()) {
			$correct = $this->gameManager->getCorrectAnswer();
			return "Grattis du har gissat rätt. Rätt svar var $correct";
		}
		else 
		{
			if ($this->gameManager->lastGuessWasTooLow()) 
				return "Felaktig gissning, det ska vara ett större tal";
			else
				return "Felaktig gissning, det ska vara ett mindre tal";
		}
	}

	private function showNumberOfGuesses() : string {
		$num = $this->gameManager->getNumberOfGuesses();
		return "Number of guesses is $num";
	}
}