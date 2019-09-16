<?php

namespace view;

class ShowCitiesView {

	private $cities;

	public function __construct(\model\Cities $model) {
		$this->cities = $model;
	}

	public function getHTML() : String {
		$citiesHMTL = "";

		foreach ($this->cities as $city) {
			$name = $city->getName();
			$district = $city->getDistrict();
			$citiesHMTL .= "<li>$name, $district</li>";
		}

		$ret = "<ul>$citiesHMTL</ul>";

		return $ret;
	}
}