<?php

class CityView {

	public function viewCities(Cities $cities) {
		echo "<ul>";
		foreach($cities as $city) {
			echo "<li>$city->name in $city->district</li>";
		}
		echo "</ul>";
	}
}