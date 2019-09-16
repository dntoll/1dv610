<?php

namespace test;

class CitiesTest {

	public function auto() {
		$kalmar = new \model\City("Kalmar", "Småland");

		$sut = new \model\Cities();

		$sut->add($kalmar);

		foreach ($sut as $city) {
			assert($city->isSame($kalmar));
			return;
		}

		assert(false);
	}
}