<?php

namespace model;

require_once("PrimeRange.php");

class PrimeNumbers {

	private $allPrimesToLargest = array();
	private $primeNumbersFoundInRange = array();

	private static $FIRST_PRIME_NUMBER = 2;

	public function __construct(PrimeRange $range) {
		
		for ($i=self::$FIRST_PRIME_NUMBER; $i <= $range->getMax(); $i++) { 
			if ($this->isPrime($i)) {
				$this->allPrimesToLargest[] = $i;

				if ($i >= $range->getMin())
					$this->primeNumbersFoundInRange[] = $i;
			}
		}
	}

	public function getPrimesInRange() : array {
		return $this->primeNumbersFoundInRange;
	}
	
	private function isPrime(int $candidate) : bool {
		foreach ($this->allPrimesToLargest as $prime) {

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
