<?php 

require_once("model/PrimeNumbers.php");
require_once("view/PrimeNumbersView.php");
require_once("controller/ListNumbersController.php");


//manual test
$v = new \view\PrimeNumbersView();
$c = new \controller\ListNumbersController($v);

$c->doListNumbers();
