<?php

require_once("StatementWrapper.php");
require_once("MySQLiWrapper.php");
require_once("Settings.php");
require_once("City.php");
require_once("Cities.php");
require_once("CityDAL.php");
require_once("CitiesDatabase.php");
require_once("CitiesFileStorage.php");

require_once("CityView.php");


//$w = new MySQLiWrapper(new Settings());
//$dal = new CitiesDatabase($w);
$dal = new CitiesFileStorage();

$dal->install();
$dal->populate();

$cv = new CityView();
$cities = $dal->getAllCities();

echo "<h2>All them Cities</h2>";
$cv->viewCities($cities);

$cities = $dal->getCitiesFromDistrict("Småland");
echo "<h2>All them Cities in Småland</h2>";
$cv->viewCities($cities);

$dal->remove();