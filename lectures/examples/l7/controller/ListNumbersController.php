<?php 


namespace controller;

class ListNumbersController {
	private $view;

	public function __construct(\view\PrimeNumbersView $v) {
		$this->view = $v;
	}

	public function doListNumbers() {
		//hantera indata
		

		$primeNumberRange = $this->view->getPrimeNumberRange();
		
		//generera primtal
		$primeNumbers = new \model\PrimeNumbers($primeNumberRange);



		//generera utdata
		
		//låt användaren mata in (visa formulär)
		$this->view->showPrimeNumberInput();

		//visa genererade primtal 
		$this->view->toOutputBuffer($primeNumbers);


	}
}