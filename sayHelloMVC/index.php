<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once("Application.php");


$app = new Application();
$app->run();


var_dump($_SESSION);
