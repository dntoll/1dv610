<?php

class P {

	public function getP($N) : array {
		$p = array();

		$i = 2;
		while (count($p) < $N) {
			if ($this->ip($p, $i)) {
				$p[] = $i;
			}
			$i++;
		}

		return $p;
	}

	private function ip($p, $n) : bool {
		if ($n == 1)
			return true;

		foreach ($p as $key => $value) {
			if ($n % $value == 0) {
				return false;
			}
		}

		return true;
	}

}

class PV {

	private $instance;

	public function __construct(P $o) {
		$this->instance = $o;
	}

	public function ob() {
		$n = $this->instance->getP(1000);

		echo "<h2>P</h2>";
		echo "<ul>";
		foreach ($n as $key => $value) {
			echo "<li>$value</li>";
		}
		echo "</ul>";

	}
}

$u = new P();
$uv = new PV($u);
$uv->ob();
