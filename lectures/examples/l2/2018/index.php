<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once("model/GameManager.php");
require_once("model/GuessedNumber.php");
require_once("view/GuessGameView.php");


require_once("controller/GuessNumberController.php");

//phpinfo();

$gameManager = new \model\GameManager();
$gameView = new \view\GuessGameView($gameManager);

$app = new \controller\GuessNumberController($gameView, $gameManager);

$app->playGame();


$htmlString = $gameView->getGameHTML();
echo $htmlString;