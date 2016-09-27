<?php

namespace test;

class CityTest {
	public function __construct() {
		$this->constructorShouldStoreValues();
	}

	private function constructorShouldStoreValues() {
		$actualCityName = "Kalamar";
		$actualCityDistrict = "Kalamar";
		$sut = new \model\City($actualCityName, $actualCityDistrict);

		assert($sut->name === $actualCityName);
		assert($sut->district === $actualCityDistrict);
	}
}