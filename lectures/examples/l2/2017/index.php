<?php

session_start();

require_once("GuessNumberController.php");
require_once("GuessedNumber.php");
require_once("GuessNumberView.php");
require_once("SecretNumber.php");
require_once("ModelExceptions.php");


$secret = new \model\SecretNumber();
$view = new \view\GuessNumberView($secret);

$controller = new \controller\GuessNumberController($view, $secret);
$controller->doPlayGame();