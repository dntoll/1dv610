<?php


require_once("Settings.php");
require_once("test/MySQLILearningTest.php");

require_once("model/CityDAL.php");
require_once("model/CityDatabase.php");

require_once("model/City.php");
require_once("model/CityCatalog.php");
require_once("model/CityDatabase.php");

require_once("test/CityTest.php");
require_once("test/CityCatalogTest.php");
require_once("test/CityDatabaseTest.php");

new test\CityDatabaseTest();
/*new test\MySQLILearningTest();
new test\CityTest();
new test\CityCatalogTest();*/