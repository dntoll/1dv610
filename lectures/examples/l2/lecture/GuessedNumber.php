<?php

namespace model;

class GuessedNumber {
	private $number;
	public static $MAX_GUESS = 255;

	public function __construct($candidate) {
		if (is_numeric($candidate) ) {
			$this->assignIfRangeIsOk($candidate);
		} else {
			throw new \Exception("Not a number");
		}
	}

	private function assignIfRangeIsOk(int $candidate) {
		$inRange = ( $candidate >= 0 && $candidate <= self::$MAX_GUESS);
		if ($inRange) { 
			$this->number = $candidate;
		} else {
			throw new \Exception("Not in range");
		}
	}

	public function __toString() : string
    {
        return "$this->number";
    }

    public function  isSameAs(SecretNumber $sol) : bool{
    	return $sol->getSecret() === $this->number;

    }

    public function getGuess() : int {
    	return $this->number;
    }
}