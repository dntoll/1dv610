<?php

namespace model;

class GameManager {

	private $guesses = array();

	public function addPlayerGuess(GuessedNumber $toBeAdded) {
		$this->guesses[] = $toBeAdded;
	}

	public function lastGuessWasCorrect() : bool {
		assert($this->hasGuessed());
		$lastGuess = $this->getLastGuess();
		return $lastGuess->IsSameAs($this->getCorrectAnswer());
	}

	public function getCorrectAnswer() : int {
		//TODO: byt ut den här magiska numret till en riktig lösning.
		return 7;
	}

	public function lastGuessWasTooLow() : bool { 

		//TODO train wrecks
		return $this->getLastGuess()->wasTooLow($this->getCorrectAnswer());
	}


	public function getNumberOfGuesses() : int {
		return count($this->guesses);
	}

	public function hasGuessed() : bool {
		return $this->getNumberOfGuesses() > 0;
	}

	private function getLastGuess() : GuessedNumber {
		return $this->guesses[$this->getNumberOfGuesses()-1];
	}
}