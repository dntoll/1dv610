<?php

namespace model;

class CityCatalog {
	private $cities = array();

	public function __construct(CityDAL $persistance) {
		$this->persistance = $persistance;
	}

	public function addCity(City $c) {
		$this->persistance->addCity($c);
	}

	public function getAllCities() : array{
		return $this->persistance->getAllCities();
	}
}