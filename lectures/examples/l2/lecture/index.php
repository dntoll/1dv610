<?php

session_start();
require_once("GuessedNumber.php");
require_once("GuessNumberView.php");
require_once("SecretNumber.php");


//TODO Allt nedan ska in i en controller!
$view = new \view\GuessNumberView();

$view->showFormAndTitle();

$secret = new \model\SecretNumber();

try {
	$view->showGuess();

	$guess = $view->getGuessedNumber();

	if ($guess->isSameAs($secret)) {
		$view->showSuccess();
	} else {
		$view->showHint($secret);
	}
} catch (Exception $e) {
	//TODO: detta bör komma in i en vy...
	//Dessutom bör inte felmeddelandet komma ut (på Engelska) utan ska ske på typ av fel
	echo "exception was " . $e->getMessage();
}