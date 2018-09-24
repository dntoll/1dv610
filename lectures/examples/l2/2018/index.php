<?php


/*function assert(bool $stmt)
{
    if ($stmt == false)
    	throw new \Exception();
}*/

error_reporting(E_ALL);
ini_set('display_errors', 'On');
assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 1);
assert_options(ASSERT_BAIL, true);
assert_options(ASSERT_CALLBACK, 'assert_failure');
assert_options(ASSERT_EXCEPTION, 1);

require_once("model/GameManager.php");
require_once("model/GuessedNumber.php");
require_once("view/GuessGameView.php");
require_once("controller/GuessNumberController.php");



//TODO: Appcontroller...

/**
* Dependency injection
* TODO: this could be moved into an Factory class, 
* to be configurable such a class can be scripted.
*/
$gameManager = new \model\GameManager();

//Note the view knows the model ( but read only )
$gameView = new \view\GuessGameView($gameManager);

//The controller has "write access" to model
$app = new \controller\GuessNumberController($gameView, $gameManager);

//Handle input, make changes to state (Controller)
try {

	if ($navigationView->playerWantsToPlay())
		$app->playGame();
} catch (\Exception $e) {
}

//Generate output given current state (Views)

if ($navigationView->playerWantsToPlay()) {
	$htmlString = $gameView->getGameHTML();
	echo $htmlString;
}