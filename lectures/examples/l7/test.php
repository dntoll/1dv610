<?php 

require_once("model/PrimeNumbers.php");
require_once("view/PrimeNumbersView.php");
require_once("test/PrimeNumbersTest.php");


//autotest
new \test\PrimeNumbersTest();


echo "<h2>Primes from 30-100</h2>";
//manual test
$m = new \model\PrimeNumbers(30, 100);
$v = new \view\PrimeNumbersView();
$v->toOutputBuffer($m);