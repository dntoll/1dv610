<?php

namespace test;

class MySQLILearningTest {

	private $mysqli;
	private $databaseName = "MySQLILearningTest";
	private $tableName = "TestTable";

	public function __construct() {

		//Warning: Must happen in this order (Chained tests)
		$this->shouldCreateDB();

		$this->shouldCreateTable();

		$this->shouldAddData();

		$this->shouldFetchData();


	}

	private function shouldCreateDB() {

		$this->mysqli = new \mysqli(\Settings::$MYSQL_HOST, 
							 \Settings::$MYSQL_USER, 
							 \Settings::$MYSQL_PASSWORD);

		assert(0 === $this->mysqli->connect_errno, "Connect failed: " . $this->mysqli->connect_error);
		

		assert(FALSE !== $this->mysqli->query("DROP DATABASE IF EXISTS $this->databaseName"));

		assert(FALSE !== $this->mysqli->query("CREATE DATABASE $this->databaseName"));
	}

	private function shouldCreateTable() {
		assert($this->mysqli->select_db("$this->databaseName"));

		assert(FALSE !== $this->mysqli->query("
						CREATE TABLE $this->tableName (pk INT AUTO_INCREMENT PRIMARY KEY, 
						Field VARCHAR(100)  )"), $this->mysqli->error);
	}

	private function shouldAddData() {
		$stmt = $this->mysqli->prepare("INSERT INTO $this->tableName (Field) VALUES(?)");
		assert($stmt !== FALSE);

		$fieldValue = "testfält";

		assert($stmt->bind_param("s", $fieldValue));
    	assert($stmt->execute());
		assert($stmt->close());
	}

	private function shouldFetchData() {
		$stmt = $this->mysqli->prepare("SELECT * FROM $this->tableName");
		assert($stmt !== FALSE);

		assert($stmt->execute());

		assert($stmt->bind_result($pk, $field));

    	assert($stmt->fetch());
    	assert($stmt->close());

    	//Warning: no connection after this...
    	assert($this->mysqli->close());
	}
		

}