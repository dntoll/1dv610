<?php 

require_once("model/PrimeNumbers.php");
require_once("view/PrimeNumbersView.php");
require_once("test/PrimeNumbersTest.php");


//autotest
new \test\PrimeNumbersTest();

//manual test
$m = new \model\PrimeNumbers(100);
$v = new \view\PrimeNumbersView($m);
$v->toOutputBuffer();