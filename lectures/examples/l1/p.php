<?php
class M {
	public $p;
	public function __construct($N) {
		$this->p = array();
		for ($i=1; $i < $N; $i++) { 
			if ($this->p($i)) {
				$this->p[] = $i;
			}
		}
	}
	private function p($N) {
		for ($i =1; $i < count($this->p) && $this->p[$i] * $this->p[$i] <= $N; $i++) { 
			if ($N % $this->p[$i] == 0) {
				return false;
			}
		}
		return true;
	}
}
class MV {
	public function __construct(M $m)  {
		$this->m = $m;
	}
	public function e() {
		echo "<ol>";
		foreach ($this->m->p as $k => $v) {
			echo "<li>$v</li>";
		}
		echo "</ol>";
	}
}
$m = new M(100);
$v = new MV($m);
$v->e();
