<?php

namespace test;

require_once("model/PrimeNumbers.php");



class PrimeNumbersTest {
	public function __construct() {
		$expected = array(2, 3, 5, 7, 11,13, 17,19,23,29,31,37,41,43,47,53,59,61,67,71,73,79,83,89,97);

		$systemUnderTest = new \model\PrimeNumbers(0, 100);


		$actual = $systemUnderTest->getPrimesInRange();

		foreach ($expected as $index => $prime) {
			assert($prime === $actual[$index], "PrimeNumbersTest was ".$actual[$index]." should be $prime at $index");
		}

		$expected = array(2, 3);
		$sut = new \model\PrimeNumbers(0,3);
		$actual = $sut->getPrimesInRange();

		foreach ($expected as $index => $prime) {
			assert($prime === $actual[$index], "PrimeNumbersTest was ".$actual[$index]." should be $prime at $index");
		}
	}
}