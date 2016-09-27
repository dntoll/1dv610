<?php

require_once("model/City.php");
require_once("model/CityCatalog.php");


$cities = new \model\CityCatalog();


$kalmar = new \model\City("Kalmar", "Småland");
$cities->addCity($kalmar);

$allCities = $cities->getAllCities();

//in view
foreach($allCities as $c) {
	echo "$c->name $c->district";
}

