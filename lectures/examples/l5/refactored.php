 <?php

//...PrimeNumbers.php

class PrimeNumbers {

	const FIRST_PRIME_NUMBER = 2;
	private $primeNumbers;

	/**
	 * Generates prime numbers up until $maxNumberGenerated
	 * 
	 * @param int $maxNumberGenerated [description]
	 */
	public function __construct(int $maxNumberGenerated) {
		$this->primeNumbers = array();
		
		for ($i= self::FIRST_PRIME_NUMBER; $i < $maxNumberGenerated; $i++) {
			if ($this->isPrime($i)) {
				$this->primeNumbers[] = $i;
			}
		}
	}

	public function getGeneratedPrimes() {
		return $this->primeNumbers;
	}

	private function isPrime(int $candidate) : bool {
		
		foreach ($this->primeNumbers as $prime) {
			if ($this->tooLargeFactor($prime, $candidate)) 
				break;

			if ($this->isFactor($prime, $candidate)) {
				return false;
			}
		}
		return true;
	}

	/**
	 * is $prime a factor of $product
	 */
	private function isFactor(int $prime, int $product) : bool {
		if ($product % $prime == 0) {
			return true;
		}
		return false;
	}

	/**
	 * is $prime too large to be a factor of $product
	 */
	private function tooLargeFactor(int $prime, int $product) : bool {
		if ($prime * $prime <= $product) {
			return false;
		}
		return true;
	}
}

//...PrimeView.php

class PrimeView {
	private $primes;

	public function __construct(PrimeNumbers $m)  {
		$this->primes = $m;
	}

	/**
	 * @sideeffect outputs HTML to the output buffer
	 */
	public function outputHTML() {
		echo "<ol>";
		foreach ($this->primes->getGeneratedPrimes() as $prime) {
			echo "<li>$prime</li>";
		}
		echo "</ol>";
	}
}

//...PrimeNumberTest.php

class PrimeNumberTest {
	//http://www.numberempire.com/primenumberstable.php
	private $firstHundredPrimes;
	public function __construct() {
		$this->firstHundredPrimes = array(2,3,5,7,11,13,17,19,23,29,31,37,41,43,47,53,59,61,67,71,73,79,83,89,97);
		$m = new PrimeNumbers(100);

		foreach ($this->firstHundredPrimes as $key => $expected) {
			$actual = $m->getGeneratedPrimes()[$key];

			assert($expected === $actual, "$key was not $expected was " . $actual);
		}

	}
}


//...tests.php
new PrimeNumberTest();


//...index.php
$generatePrimesUpUntilNumber = 100;

$m = new PrimeNumbers($generatePrimesUpUntilNumber);
$v = new PrimeView($m);
$v->outputHTML();
