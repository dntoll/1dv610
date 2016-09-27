<?php

class StatementWrapper {

	public function __construct(mysqli $mysqli) {
		$this->mysqli = $mysqli;

		$this->stmt = $this->mysqli->stmt_init();
	}

	public function prepare($sql) {
		if ($this->stmt->prepare($sql) === FALSE) {
			throw new \Exception("Error preparing statement " . $this->mysqli->error);
		}
	}

	public function bindParam(string $types, array $parameters) {
		array_unshift($parameters, $types); //add the types to the beginning of the array!

		if (call_user_func_array(array(&$this->stmt, 'bind_param'), $parameters) === FALSE) {
			throw new \Exception("Unable to bind_param ");	
		}
	}

	public function bindResults(string $types, array $parameters) {
		array_unshift($parameters, $types); //add the types to the beginning of the array!

		if (call_user_func_array(array(&$this->stmt, 'bind_param'), $parameters) === FALSE) {
			throw new \Exception("Unable to bind_param ");	
		}
	}

	public function bindResult(array $parameters) {
		if (call_user_func_array(array(&$this->stmt, 'bind_result'), $parameters) === FALSE) {
			throw new \Exception("Unable to bind_result statement");			
		}
	}

	public function execute() {
		if ($this->stmt->execute() === FALSE) {
			throw new \Exception("Unable to execute statement");		
		}
	}

	public function fetch() {
		return $this->stmt->fetch();
	}

	public function close() {
		if ($this->stmt->close() === FALSE) {
			throw new \Exception("Unable to close");			
		}
	}
}