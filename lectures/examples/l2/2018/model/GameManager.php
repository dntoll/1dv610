<?php

namespace model;

class GameManager {

	private $guesses = array();

	public function addPlayerGuess(GuessedNumber $toBeAdded) {
		$this->guesses[] = $toBeAdded;
	}

	public function lastGuessWasCorrect() : bool {

		$numGuesses = count($this->guesses);
		return $this->guesses[$numGuesses-1] == $this->getCorrectAnswer();
	}

	public function getCorrectAnswer() : int {
		//TODO: byt ut den här magiska numret till en riktig lösning.
		return 7;
	}
}