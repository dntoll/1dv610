<?php

namespace test;

require_once("model/PrimeNumbers.php");



class PrimeNumbersTest {
	public function __construct() {
		//TODO: Refactor this, divide into private methods and add custom assert method
		$expected = array(2, 3, 5, 7, 11,13, 17,19,23,29,31,37,41,43,47,53,59,61,67,71,73,79,83,89,97);

		$primeRange = new \model\PrimeRange(0,100);

		$systemUnderTest = new \model\PrimeNumbers($primeRange);


		$actual = $systemUnderTest->getPrimesInRange();

		foreach ($expected as $index => $prime) {
			assert($prime === $actual[$index], "PrimeNumbersTest was ".$actual[$index]." should be $prime at $index");
		}

		$expected = array(2, 3);
		$primeRange = new \model\PrimeRange(0,3);
		$sut = new \model\PrimeNumbers($primeRange);
		$actual = $sut->getPrimesInRange();

		foreach ($expected as $index => $prime) {
			assert($prime === $actual[$index], "PrimeNumbersTest was ".$actual[$index]." should be $prime at $index");
		}
	}
}