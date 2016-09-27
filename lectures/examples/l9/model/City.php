<?php

namespace model;

class City {
	public $name;
	public $district;

	public function __construct($name, $district) {
		$this->name = $name;
		$this->district = $district;
	}
}