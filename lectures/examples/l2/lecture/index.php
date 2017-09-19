<?php

session_start();

require_once("GuessNumberController.php");
require_once("GuessedNumber.php");
require_once("GuessNumberView.php");
require_once("SecretNumber.php");
require_once("ModelExceptions.php");

$controller = new \controller\GuessNumberController();
$controller->doPlayGame();