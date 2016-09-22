<?php 

namespace view;

require_once("model/PrimeNumbers.php");

class PrimeNumbersView {
	private static $DEFAULT_MIN_PRIME = 1;
	private static $DEFAULT_MAX_PRIME = 7;
	private static $URL_MIN_PRIME = "primeMin";
	private static $URL_MAX_PRIME = "primeMex";

	public function __construct()  {
		
	}

	public function toOutputBuffer( \model\PrimeNumbers $toBeVisualized) {
		echo "<ol>";
		foreach ($toBeVisualized->getPrimesInRange() as $prime) {
			echo "<li>$prime</li>";
		}
		echo "</ol>";
	}

	public function getLargestPrimeNumberFromUser() : int {
		if (isset($_GET[self::$URL_MAX_PRIME]))
			return $_GET[self::$URL_MAX_PRIME];
		else
			return self::$DEFAULT_MAX_PRIME;
	}

	public function getSmallestPrimeNumberFromUser() : int {
		if (isset($_GET[self::$URL_MIN_PRIME]))
			return $_GET[self::$URL_MIN_PRIME];
		else
			return self::$DEFAULT_MIN_PRIME;
	}

	public function showPrimeNumberInput() {
		$lowest = $this->getSmallestPrimeNumberFromUser();
		$last = $this->getLargestPrimeNumberFromUser();

		echo "<form method='GET'>
				<input type='text' name='".self::$URL_MIN_PRIME."' value='$lowest'/><br/>
				<input type='text' name='".self::$URL_MAX_PRIME."' value='$last'/>
				<input type='submit' value='sned'/>
			  </form>";
	}
}