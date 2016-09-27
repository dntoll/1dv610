<?php

class City {
	public $name;
	public $district;
	
	public function __construct(string $name, string $district) {
		$this->name = $name;
		$this->district = $district;
	}
}