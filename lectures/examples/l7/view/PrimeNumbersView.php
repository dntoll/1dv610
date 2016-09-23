<?php 

namespace view;

require_once("model/PrimeNumbers.php");

class PrimeNumbersView {
	private static $DEFAULT_MIN_PRIME = 1;
	private static $DEFAULT_MAX_PRIME = 7;
	private static $URL_MIN_PRIME = "primeMin";
	private static $URL_MAX_PRIME = "primeMex";

	private $message = "";

	public function __construct()  {
		
	}

	public function toOutputBuffer( \model\PrimeNumbers $toBeVisualized) {
		echo "<ol>";
		foreach ($toBeVisualized->getPrimesInRange() as $prime) {
			echo "<li>$prime</li>";
		}
		echo "</ol>";
	}

	public function getPrimeNumberRange() : \model\PrimeRange {
		$min = $this->getSmallestPrimeNumberFromUser();
		$max = $this->getLargestPrimeNumberFromUser();
		try {
			return new \model\PrimeRange($min, $max);
		} catch (\Exception $e) {

			$this->message = "The smallest prime must be lower than the highest.";
			return new \model\PrimeRange($max, $min);
		}
	}

	private function getLargestPrimeNumberFromUser() : int {
		if (isset($_GET[self::$URL_MAX_PRIME]))
			return $_GET[self::$URL_MAX_PRIME];
		else
			return self::$DEFAULT_MAX_PRIME;
	}

	private function getSmallestPrimeNumberFromUser() : int {
		if (isset($_GET[self::$URL_MIN_PRIME]))
			return $_GET[self::$URL_MIN_PRIME];
		else
			return self::$DEFAULT_MIN_PRIME;
	}

	public function showPrimeNumberInput() {
		$lowest = $this->getSmallestPrimeNumberFromUser();
		$last = $this->getLargestPrimeNumberFromUser();

		echo "<p>$this->message</p><form method='GET'>
				<input type='text' name='".self::$URL_MIN_PRIME."' value='$lowest'/><br/>
				<input type='text' name='".self::$URL_MAX_PRIME."' value='$last'/>
				<input type='submit' value='sned'/>
			  </form>";
	}
}