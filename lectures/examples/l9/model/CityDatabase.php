<?php

namespace model;

require_once("CityDAL.php");

class CityDatabase implements CityDAL {

	private $mysqli;

	public function __construct() {
		$this->mysqli = new \mysqli(\Settings::$MYSQL_HOST, 
							 \Settings::$MYSQL_USER, 
							 \Settings::$MYSQL_PASSWORD);

		if ($this->mysqli->connect_errno !== 0) {
			throw new \Exception("Connect failed: " . $this->mysqli->connect_error);
		}
		
	}

	public function install() {
		//skapa databas & tabeller om de inte finns
		//
		$ok = $this->mysqli->query("CREATE DATABASE IF NOT EXISTS " . \Settings::$DATABASE_NAME);

		if ($ok === FALSE) {
			throw new \Exception();
		}


	}

	public function addCity(City $city) {

	}

	public function getAllCities() : array {
		return array();
	}
}