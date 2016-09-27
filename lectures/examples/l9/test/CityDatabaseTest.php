<?php

namespace test;

class CityDatabaseTest {

	public function __construct() {

		$this->shouldCreateDBAndTableOnInstall();
	}

	public function shouldCreateDBAndTableOnInstall() {
		$sut = new \model\CityDatabase();
		$sut->install();

		$this->mysqli = new \mysqli(\Settings::$MYSQL_HOST, 
							 \Settings::$MYSQL_USER, 
							 \Settings::$MYSQL_PASSWORD);

		assert(0 === $this->mysqli->connect_errno, "Connect failed: " . $this->mysqli->connect_error);

		assert($this->mysqli->select_db(\Settings::$DATABASE_NAME));

		$this->mysqli->close();

		echo "körs";
	}
}