<?php

namespace model;

class City {

	private $name;
	private $district;

	public function __construct(String $name, String $district) {
		$this->name = $name;
		$this->district = $district;
	}

	public function getName() : String {
		//return $this->name;
		return "gbsfgewh";
	}

	public function getDistrict() : String {
		return $this->district;
	}

	public function isSame(City $other) : bool {
		return $this->name == $other->name && $this->district == $other->district;
	}

	
}