<?php

namespace model;

class GuessedNumber {
	private $guess;//int


	public function __construct(int $guess) {
		$this->guess = $guess;
	}

	public function IsSameAs(int $other) : bool {
		return $this->guess == $other;
	}

	public function wasTooLow(int $other) : bool {
		return $this->guess < $other;
	}
}