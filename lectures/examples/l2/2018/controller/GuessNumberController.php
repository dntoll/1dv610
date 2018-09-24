<?php

namespace controller;

class GuessNumberController {
	private $view;
	private $gameManager;

	public function __construct(\view\GuessGameView $view, \model\GameManager $manager) {
		$this->view = $view;
		$this->gameManager = $manager;
	}


	public function playGame() {

		if ($this->view->playerHasGuess()) {
			
			$guess = $this->view->getGuessedNumber();
			$this->gameManager->addPlayerGuess($guess);
			
		}

	}
}