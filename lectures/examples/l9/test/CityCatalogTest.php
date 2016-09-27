<?php

namespace test;

class CityCatalogTest {
	public function __construct() {
		$this->shouldAddCity();
		$this->shouldKeepCitiesPersistant();
	}

	private function shouldAddCity() {
		$cityDAL = new \model\CityDatabase();
		$sut = new \model\CityCatalog($cityDAL);

		$c = new \model\City("a", "b");
		$sut->addCity($c);


		$actualCityArray = $sut->getAllCities();

		assert(count($actualCityArray) === 1);
		assert($actualCityArray[0]->name === "a");
	}

	private function shouldKeepCitiesPersistant() {

		$cityDAL = new \model\CityDatabase();
		$cat = new \model\CityCatalog($cityDAL);

		$c = new \model\City("a", "b");
		$cat->addCity($c);

		$sut = new \model\CityCatalog($cityDAL);
		$actualCityArray = $sut->getAllCities();

		assert(count($actualCityArray) === 1);
		assert($actualCityArray[0]->name === "a");
	}


}