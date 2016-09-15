<?php 

namespace view;

require_once("model/PrimeNumbers.php");

class PrimeNumbersView {
	private $toBeVisualized;

	public function __construct(\model\PrimeNumbers $toBeVisualized)  {
		$this->toBeVisualized = $toBeVisualized;
	}

	public function toOutputBuffer() {
		echo "<ol>";
		foreach ($this->toBeVisualized->primeNumbersFound as $prime) {
			echo "<li>$prime</li>";
		}
		echo "</ol>";
	}

	public function getLargestPrimeNumber() : int {
		
		return $_GET['primeMax'];
	}

	public function showPrimeNumberInput() {
		echo "<form method='GET'><input type='text' name='primeMax'/></form>";
	}
}