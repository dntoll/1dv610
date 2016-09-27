<?php

abstract class CityDAL {

	abstract public function install();
	abstract public function remove();

	abstract public function save(City $toBeSaved);

	abstract public function getAllCities() : Cities;
	abstract public function getCitiesFromDistrict(string $district) : Cities;

	public function populate() {
		$initialData = array(new City("Kalmar", "Småland"), 
							 new City("Växjö", "Småland"), 
							 new City("Stockholm", "Stockholms län"));
		foreach ($initialData as $city) {
			$this->save($city);
		}
	}
}