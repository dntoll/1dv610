<?php

namespace test;


require_once("src/app/view/ShowCitiesView.php");


class CityStub extends \model\City {
	const FejkName = "a";
	const FejkDistrict = "b";

	public function __construct() {

	}

	public function getName() : String{
		return self::FejkName;
	}

	public function getDistrict() : String {
		return self::FejkDistrict;
	}
}

class CitiesStub extends \model\Cities {
	private $fejk;

	public function __construct() {
		$this->fejk = array(new CityStub(), new CityStub());
	}

	public function getIterator() {
        return new \ArrayIterator($this->fejk);
    }
}


class ShowCitiesTest {
	public function auto() {
	
		$expectedOutput = "<ul><li>a, b</li><li>a, b</li></ul>";

		$threeCities = new CitiesStub();
		$sut = new \view\ShowCitiesView($threeCities);

		assert( $expectedOutput == $sut->getHTML() );
	}
}