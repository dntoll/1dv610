<?php

namespace test;

class MySQLILearningTest {

	public function __construct() {
		$this->shouldCreateDB();
	}

	private function shouldCreateDB() {

		$mysqli = new \mysqli(\Settings::$MYSQL_HOST, 
							 \Settings::$MYSQL_USER, 
							 \Settings::$MYSQL_PASSWORD);
/*
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

if ($mysqli->query("CREATE TEMPORARY TABLE myCity LIKE City") === TRUE) {
    printf("Table myCity successfully created.\n");
}


if ($result = $mysqli->query("SELECT Name FROM City LIMIT 10")) {
    printf("Select returned %d rows.\n", $result->num_rows);


    $result->close();
}

if ($result = $mysqli->query("SELECT * FROM City", MYSQLI_USE_RESULT)) {
    if (!$mysqli->query("SET @a:='this will not work'")) {
        printf("Error: %s\n", $mysqli->error);
    }
    $result->close();
}

$mysqli->close();*/
	}
}