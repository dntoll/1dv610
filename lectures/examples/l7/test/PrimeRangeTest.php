<?php


namespace test;

class PrimeRangeTest {

	public function __construct() {

		$this->testMinMax();
		$this->testMinMustBeLowerThanMax();
	}

	private function testMinMustBeLowerThanMax() {
		try {
			$sut = new \model\PrimeRange(3,2);

			assert(false, "PrimeRange constructor should throw exception on min higher than max");
		} catch (\Exception $e) {
			//OK
		}
	}

	private function testMinMax() {
		$sut = new \model\PrimeRange(2,3);

		assert($sut->getMin() == 2);
		assert($sut->getMax() == 3);
	}
}