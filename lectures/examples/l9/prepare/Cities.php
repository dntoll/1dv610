<?php

class Cities  implements IteratorAggregate {
 	private $cities = array();

	public function __construct() {

	}

	// Required definition of interface IteratorAggregate
	//http://php.net/manual/en/class.iteratoraggregate.php#112432
    public function getIterator() {
        return new ArrayIterator($this->cities);
    }

	public function add(City $value) {
        $this->cities[] = $value;
    }
}