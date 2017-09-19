<?php

namespace model;

class GuessedNumber {
	private $number;
	public static $MAX_GUESS = 255;
	public static $MIN_GUESS = 0;

	public function __construct($candidate) {
		if (is_numeric($candidate) ) {
			$this->assignIfRangeIsOk($candidate);
		} else {
			throw new NotNumberException();
		}
	}

	private function assignIfRangeIsOk(int $candidate) {
		//TODO Remove the magic number 0
		$inRange = ( $candidate >= self::$MIN_GUESS && $candidate <= self::$MAX_GUESS);
		if ($inRange) { 
			$this->number = $candidate;
		} else {
			throw new NotInRangeException();
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