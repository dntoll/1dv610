<?php

class CitiesDatabase extends CityDAL {
	private static $DATABASE_NAME = "world";
	private static $CREATE_DB_QUERY = "CREATE DATABASE IF NOT EXISTS world ";
	private static $REMOVE_DB_QUERY = "DROP DATABASE IF EXISTS world ";
	private static $CREATE_TABLE_QUERY = "CREATE TABLE IF NOT EXISTS City (
												pk INT AUTO_INCREMENT PRIMARY KEY, 
												Name VARCHAR(100), 
												District VARCHAR(100)
											)";
	private static $INSERT_QUERY = "INSERT INTO City (Name, District) VALUES(?,?);";
	private static $SELECT_ALL_QUERY = "SELECT Name, District FROM City";
	private static $SELECT_BY_DISTRICT = "SELECT Name, District FROM City WHERE District = ?";

	private $mysqli;

	public function __construct(MySQLiWrapper $w) {
		$this->mysqli = $w;
	}

	public function install() {
		$this->mysqli->query(self::$CREATE_DB_QUERY);
		$this->mysqli->selectDatabase(self::$DATABASE_NAME);
		$this->mysqli->query(self::$CREATE_TABLE_QUERY);
	}

	public function remove() {
		$this->mysqli->query(self::$REMOVE_DB_QUERY);
	}

	public function save(City $toBeSaved)  {

		$this->mysqli->selectDatabase(self::$DATABASE_NAME);
		$stmt =  $this->mysqli->initStatement();

		$stmt->prepare(self::$INSERT_QUERY);
		$stmt->bindParam("ss", array(&$toBeSaved->name, &$toBeSaved->district));
		$stmt->execute();
		$stmt->close();
	}

	public function getAllCities() : Cities {

		$this->mysqli->selectDatabase(self::$DATABASE_NAME);
		$stmt = $this->mysqli->initStatement();
		$stmt->prepare(self::$SELECT_ALL_QUERY);
		return $this->getArrayResult($stmt);
	}
	

	public function getCitiesFromDistrict(string $district) : Cities {

		$this->mysqli->selectDatabase(self::$DATABASE_NAME);
		$stmt = $this->mysqli->initStatement();
		$stmt->prepare(self::$SELECT_BY_DISTRICT);
		$stmt->bindParam("s", array(&$district));
		return $this->getArrayResult($stmt);
	}

	private function getArrayResult(StatementWrapper $stmt) : Cities {
		$stmt->execute();
		$stmt->bindResult(array(&$name, &$district));

		$ret = new Cities();
		while ($stmt->fetch()) {
			$ret->add(new City($name, $district));
    	}

		$stmt->close();
		return $ret;
	}
}