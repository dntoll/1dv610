<?php

//NOTE This is for prepping
class GuessGameModel {
	private static $SESSION_NUMBER_INDEX = __CLASS__ . "::NumberIndex";
	private static $SESSION_NUMBER_OF_GUESSES_INDEX = __CLASS__ . "::GuessesIndex";

	private static $MAX_NUMBER = 255;


	public function __construct() {
		assert(session_status() != PHP_SESSION_NONE);

		if ($this->hasNoSecret()) {
			$this->generateNewSecret();
		}
	}

	public function isACorrectGuess(int $guessedValue) : bool{
		return $_SESSION[self::$SESSION_NUMBER_INDEX] == $guessedValue;	
	}

	public function guessedToLow(int $guessedValue) : bool{
		return $_SESSION[self::$SESSION_NUMBER_INDEX] > $guessedValue;	
	}

	public function getGuessesCount() {
		return $_SESSION[self::$SESSION_NUMBER_OF_GUESSES_INDEX];	
	}

	public function countGuesses() {
		$_SESSION[self::$SESSION_NUMBER_OF_GUESSES_INDEX]++;
	}

	public function generateNewSecret() {
		$_SESSION[self::$SESSION_NUMBER_INDEX] = rand() % self::$MAX_NUMBER;
		$_SESSION[self::$SESSION_NUMBER_OF_GUESSES_INDEX] = 0;
	}

	private function hasNoSecret() {
		return isset($_SESSION[self::$SESSION_NUMBER_INDEX]) == false;
	}
}

class GuessNumberView {
	public static $DOES_TO_MUCH_URL_ID = "DoesTooMuch";

	private static $START_OVER_URL_ID = "StartOver";
	private static $GUESS_NUMBER_URL_ID = "number";

	private $model;


	public function __construct(GuessGameModel $model) {
		$this->model = $model;
	}

	public function hasValidGuessInput() : bool {
		if (isset($_REQUEST[self::$GUESS_NUMBER_URL_ID])) {
			if (is_numeric($_REQUEST[self::$GUESS_NUMBER_URL_ID]) === true) {
				return true;
			}	
		} 
		return false;
	}

	public function hasInvalidInput() : bool {
		if (isset($_REQUEST[self::$GUESS_NUMBER_URL_ID])) {
			return true;
		}
		return false;
	}

	public function getGuessedValue() : int {
		return $_REQUEST[self::$GUESS_NUMBER_URL_ID];
	}

	
	public function playerWantsToStartOver() : bool {
		return isset($_REQUEST[self::$START_OVER_URL_ID]);
	}
	

	public function echoIncorrectInput() {
		echo "A problem occurred... the input was invalid...";
	}

	public function echoCorrectGuess() {
		echo " Congratulations you guessed the correct number... in ". $this->model->getGuessesCount() . " guesses! ";
						echo "<a href='?".self::$START_OVER_URL_ID."&".self::$DOES_TO_MUCH_URL_ID."'>Start Over<a>";
	}

	public function echoIncorrectGuess() {
		$theValue = $this->getGuessedValue();

		$this->echoForm(false,$theValue);

		echo "your guess number " .$this->model->getGuessesCount(). " was " . $theValue . "<br/>";
		if ($this->model->guessedToLow($theValue)) {
			echo " My Value is higher...";
		} else {
			echo " My Value is lower...";
		}
	}

	public function echoForm(bool $hasValue = false, int $theValue = 0) {
		echo "
			<h2>Guess the number</h2>
			<form action='?".self::$DOES_TO_MUCH_URL_ID."' method='post'>";

		if ($hasValue) {
			echo "<input type='text' name='".self::$GUESS_NUMBER_URL_ID."' value='$theValue'>";
		} else {
			echo "<input type='text' name='".self::$GUESS_NUMBER_URL_ID."' >";
		}
		echo "<input type='submit'>
			</form>";
	}
}

class GuessNumberController {

	public static $DOES_TO_MUCH_URL_ID = "DoesTooMuch";

	public function __construct() {
		$this->model = new GuessGameModel();
		$this->view = new GuessNumberView($this->model);
	}

	public function runGame() {
		if ($this->view->playerWantsToStartOver()) {
			$this->model->generateNewSecret();
		}

		if ($this->view->hasValidGuessInput()) {
			$this->countGuessesAndGenerateOutput();
		} else {
			$this->handleInvalidGuess();
		}
	}

	

	private function countGuessesAndGenerateOutput() {
		$this->model->countGuesses();
		$this->validGuessOutput();
	}

	private function validGuessOutput() {
		if ($this->model->isACorrectGuess( $this->view->getGuessedValue()) ) {
			$this->view->echoCorrectGuess();
		} else {
			$this->view->echoIncorrectGuess();
		}
	}

	private function handleInvalidGuess() {
		if ($this->view->hasInvalidInput()) {
			$this->view->echoIncorrectInput();
		}
		$this->view->echoForm();
	}
	

	
}


//Application...
session_start();
$first = new \GuessNumberController();
$first->runGame();




