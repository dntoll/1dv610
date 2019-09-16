<?php

namespace model;

class Cities implements \IteratorAggregate {

	private $cities;

	public function __construct() {
		$this->cities = array();
	}

	public function add(City $toBeAdded) {
		$this->cities[] = $toBeAdded;
	}

	public function getIterator() {
        return new \ArrayIterator($this->cities);
    }
}