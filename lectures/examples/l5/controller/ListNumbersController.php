<?php 


namespace controller;

class ListNumbersController {
	private $view;

	public function __construct(\model\PrimeNumbers $m, \view\PrimeNumbersView $v) {
		$this->view = $v;
	}

	public function doListNumbers() {
		//hantera indata
		
		//hämta största primtalet från användaren
		$maxPrime = $this->view->getLargestPrimeNumber();

		//generera primtal
		$primeNumbers = new \model\PrimeNumbers($maxPrime);



		//generera utdata
		
		$view = new \view\PrimeNumbersView($primeNumbers);
		
		//låt användaren mata in (visa formulär)
		$view->showPrimeNumberInput();

		//visa genererade primtal 
		$view->toOutputBuffer();


	}
}