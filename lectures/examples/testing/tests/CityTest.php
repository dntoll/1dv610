<?php

namespace test;

class CityTest {
	private static $name = "Kalmar";
	private static $district = "Småland";
	private static $otherDistrict = "Uppland";

	private $sut;
	private $vaxjo;
	private $kalmarIUppland;

	public function __construct() {
		$this->sut = new \model\City(self::$name, self::$district);
		$this->vaxjo = new \model\City("Växjö", self::$district);
		$this->kalmarIUppland = new \model\City(self::$name, self::$otherDistrict);
	}

	public function auto() {
		$this->shouldBeSame();
		$this->shouldNotBeSameName();
		$this->shouldNotBeSameDistrict();
		$this->shouldReturnKalmar();
		$this->shouldReturnSmaland();
	}

	private function shouldBeSame() {
		assert($this->sut->isSame($this->sut));
	}

	private function shouldNotBeSameName() {
		assert(false == $this->sut->isSame($this->vaxjo));
	}

	private function shouldNotBeSameDistrict() {
		assert(false == $this->sut->isSame($this->kalmarIUppland));
	}

	private function shouldReturnKalmar() {
		assert(self::$name == $this->sut->getName());
	}

	private function shouldReturnSmaland() {
		assert(self::$district == $this->sut->getDistrict());
	}
}