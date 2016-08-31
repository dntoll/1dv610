<?php

class P {

	private $p = array();

	public function getP($N) : array {
		$i = 2;
		while (count($this->p) < $N) {
			if ($this->ip($i)) {
				$this->p[] = $i;
			}
			$i++;
		}

		return $this->p;
	}

	private function ip($n) : bool {
		if ($n <= 1)
			return false;

		foreach ($this->p as $key => $value) {
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
		$n = $this->instance->getP(55);

		echo "<h2>P's up to 55</h2>";
		echo "<ul>";
		foreach ($n as $key => $value) {
			$key = $key+1;
			echo "<li>#$key. $value</li>";
		}
		echo "</ul>";

	}
}

$u = new P();
$uv = new PV($u);
$uv->ob();
