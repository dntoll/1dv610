<?php

//Note this is an example on how NOT to do it
class DoesTooMuch {

	private static $DOES_TO_MUCH_URL_ID = "DoesTooMuch";
	private static $START_OVER_URL_ID = "StartOver";
	private static $GUESS_NUMBER_URL_ID = "number";

	private static $SESSION_NUMBER_INDEX = "DoesTooMuch::NumberIndex";
	private static $SESSION_NUMBER_OF_GUESSES_INDEX = "DoesTooMuch::GuessesIndex";

	private static $MAX_NUMBER = 255;



	public function run() {
		
		
		if (isset($_GET[self::$DOES_TO_MUCH_URL_ID])) {
			session_start();

			if (isset($_SESSION[self::$SESSION_NUMBER_INDEX]) == false || 
				isset($_REQUEST[self::$START_OVER_URL_ID])) {
				$_SESSION[self::$SESSION_NUMBER_INDEX] = rand() % self::$MAX_NUMBER;
				$_SESSION[self::$SESSION_NUMBER_OF_GUESSES_INDEX] = 0;
			}

			$secretNumber = $_SESSION[self::$SESSION_NUMBER_INDEX];

			try {

				if (isset($_REQUEST[self::$GUESS_NUMBER_URL_ID])) {
					$theValue = $_REQUEST[self::$GUESS_NUMBER_URL_ID];
					if (is_numeric($theValue) === false) {
						throw new \Exception("Invalid output");
					}

					if ($theValue != $secretNumber) {
						
						

						$_SESSION[self::$SESSION_NUMBER_OF_GUESSES_INDEX]++;
						echo "your guess number " .$_SESSION[self::$SESSION_NUMBER_OF_GUESSES_INDEX]. " was " . $theValue . "<br/>";
						if ($theValue < $secretNumber) {
							echo " My Value is higher...";
						} else {
							echo " My Value is lower...";
						}

						echo "
						<h2>Guess the number</h2>
						<form action='?".self::$DOES_TO_MUCH_URL_ID."' method='post'>
							<input type='text' name='".self::$GUESS_NUMBER_URL_ID."' value='$theValue'>
							<input type='submit'>
						</form>";
						
					} else {
						echo " Congratulations you guessed the correct number... in ". $_SESSION[self::$SESSION_NUMBER_OF_GUESSES_INDEX] . " guesses! ";
						echo "<a href='?".self::$START_OVER_URL_ID."&".self::$DOES_TO_MUCH_URL_ID."'>Start Over<a>";
					}
				} else {
					echo "
					<h2>Guess the number</h2>
					<form action='?".self::$DOES_TO_MUCH_URL_ID."' method='post'>
						<input type='text' name='".self::$GUESS_NUMBER_URL_ID."' >
						<input type='submit'>
					</form>";
					
				}
			} catch (\Exception $e) {
				echo "A problem occurred... the input was invalid...";
				echo "
					<h2>Guess the number</h2>
					<form action='?".self::$DOES_TO_MUCH_URL_ID."' method='post'>
						<input type='text' name='".self::$GUESS_NUMBER_URL_ID."' >
						<input type='submit'>
					</form>";
			}
		}
	}
}


$first = new \DoesTooMuch();

$first->run();




