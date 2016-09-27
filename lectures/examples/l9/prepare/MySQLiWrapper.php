<?php

class MySQLiWrapper {
	private $mysqli;

	public function __construct(Settings $s) {
		$this->mysqli = new mysqli($s->servername, $s->username, $s->password);
		if ($this->mysqli->connect_error) {
			throw new \Exception("Connection failed: " . $this->mysqli->connect_error);
		}
	}

	public function query(string $sqlStatement)  {
		if ($this->mysqli->query($sqlStatement) === FALSE) {
    		throw new \Exception("Error running query: " . $this->mysqli->error);
		} 
	}

	public function selectDatabase(string $database)  {
		if ($this->mysqli->select_db($database) === FALSE) {
			throw new \Exception("Error selecting database: " . $this->mysqli->error);
		}
	}

	public function initStatement() : StatementWrapper{
		return new StatementWrapper($this->mysqli);
	}

	public function close() {
		if ($this->mysqli->close() === FALSE) {
			throw new \Exception("Error closing connection: " . $this->mysqli->error);
		}
	}
}