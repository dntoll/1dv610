<?php

namespace model;

class PrimeNumbers {
	public $primeNumbersFound;

	private static $FIRST_PRIME_NUMBER = 2;

	public function __construct(int $largestGenerated) {
		$this->primeNumbersFound = array();
		for ($i=self::$FIRST_PRIME_NUMBER; $i < $largestGenerated; $i++) { 
			if ($this->isPrime($i)) {
				$this->primeNumbersFound[] = $i;
			}
		}
	}
	
	private function isPrime(int $candidate) : bool {
		foreach ($this->primeNumbersFound as $prime) {

			if ($this->isFactorTooLarge($prime, $candidate)) {
				break;
			}

			if ($this->isFactor($prime, $candidate)) {
				return false;
			}
		}
		return true;
	}

	private function isFactorTooLarge($factor, $product) {
		if ($factor * $factor > $product) {
			return true;
		}
		return false;
	}

	private function isFactor($prime, $product) {
		if ($product % $prime == 0) {
			return true;
		}

		return false;
	}
}
