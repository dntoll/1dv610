<?php
/**
 * Example code for the lecture examples, not really tested...
 */

namespace lecture;


//No class only array
$centerPoint = array(12, 7);
$centerPoint[0] = 14; //x

//computations (spread across the solution)
$radius = sqrt($centerPoint[0] * $centerPoint[0] + $centerPoint[1] * $centerPoint[1]);
$theta = atan($centerPoint[1] / $centerPoint[0]);
//...
$radius = sqrt($centerPoint[0] * $centerPoint[0] + $centerPoint[1] * $centerPoint[1]);
$theta = atan($centerPoint[1] / $centerPoint[0]);

//No class but named indices
$centerPoint = array("x" => 12, "y" => 7);
$centerPoint["x"] = 14;

//computations (spread across the solution)
$radius = sqrt($centerPoint["x"] * $centerPoint["x"] + $centerPoint["y"] * $centerPoint["y"]);
$theta = atan($centerPoint["y"] / $centerPoint["x"]);
//...
$radius = sqrt($centerPoint["x"] * $centerPoint["x"] + $centerPoint["y"] * $centerPoint["y"]);
$theta = atan($centerPoint["y"] / $centerPoint["x"]);



class Point {
	private $x;
	private $y;

	public function __construct(float $x, float $y) {
		$this->x = $x;
		$this->y = $y;
	}

	public function setCartesian(float $x, float $y) {
		$this->x = $x;
		$this->y = $y;
	}

	public function getPolarRadius() : float {
		return sqrt($this->x * $this->x + $this->y * $this->y);
	}

	public function getPolarTheta() : float {
		return atan($this->y / $this->x);
	}
}

//Class 
$center = new Point(12, 7);
$center->setCartesian(14, 7);

//use of class (spread across the solution)
$radius = $center->getPolarRadius();
$theta = $center->getPolarTheta();
//...
$radius = $center->getPolarRadius();
$theta = $center->getPolarTheta();

class Point2 {
	private $radius;
	private $theta;

	public function __construct(float $x, float $y) {
		$this->setCartesian($x, $y);
	}

	public function setCartesian($x, $y) {
		$this->radius = sqrt($x * $x + $y + $y);
		$this->theta = atan($y / $x);
	}

	public function getPolarRadius() : float {
		return $this->radius;
	}

	public function getPolarTheta() : float {
		return $this->theta;
	}
}



interface Point {
	public function __construct(float $x, float $y);

	public function setCartesian(float $x, float $y);

	public function getPolarRadius() : float;

	public function getPolarTheta() : float;
}


1. $danielsPhoneNumbers = array("070...", "073...", "076...");
2. $userDaniel = array("Daniel", "Toll", $danielsPhoneNumbers, 37);
3. $userCredentials = array($username, $password, $passwordRepeat); 


class Point {
	public $x;
	public $y;
}

//Functions are outside
//computations (spread across the solution)
$p = new Point();
$p->x = 14;
$p->y = 7;
$radius = sqrt($p->x * $p->x + $p->y * $p->y);
$theta = atan($p->y / $p->x);
//...
$radius = sqrt($p->x * $p->x + $p->y * $p->y);
$theta = atan($p->y / $p->x);