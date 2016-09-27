<?php

namespace model;

interface CityDAL {
	public function addCity(City $city);

	public function getAllCities() : array;
}