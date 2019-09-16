<?php

namespace test;

require_once("src/app/model/City.php");
require_once("src/app/model/Cities.php");
echo "Tests started...";
/*
require_once("tests/CityTest.php");

$test = new CityTest();
$test->auto();

require_once("tests/CitiesTest.php");

$test = new CitiesTest();
$test->auto();
*/
require_once("tests/ShowCitiesTest.php");

$test = new ShowCitiesTest();
$test->auto();

echo "Tests completed";