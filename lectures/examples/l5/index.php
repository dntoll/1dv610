<?php 

require_once("model/PrimeNumbers.php");
require_once("view/PrimeNumbersView.php");
require_once("controller/ListNumbersController.php");


//manual test
$m = new \model\PrimeNumbers(100);
$v = new \view\PrimeNumbersView($m);
$c = new \controller\ListNumbersController($m, $v);

$c->doListNumbers();
