<?php

namespace model;

class PrimeRange {

	public function __construct(int $min, int $max) {
		if ($min > $max)
			throw new \Exception("PrimeRange min must be lower than max");

		$this->min = $min;
		$this->max = $max;
	}

	public function getMax() : int {
		return $this->max;
	}

	public function getMin() : int {
		return $this->min;
	}
}