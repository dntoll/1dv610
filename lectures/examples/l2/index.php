<?php


class Lecture2View {

	public function __construct() {
		echo "<a href='doOneThing.php?DoesTooMuch'>Does Too Much </a>";
		echo "<a href='doOneThing.php'>Ok less per method</a>";
	}
}


new \Lecture2View();
