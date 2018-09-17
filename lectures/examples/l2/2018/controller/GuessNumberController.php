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
		//Systemet precenterar att det har ett nummer för anvndaren att gissa

		//Användaren matar in ett gissat tal
		if ($this->view->playerHasGuess()) {
			$guess = $this->view->getGuessedNumber();

			$this->gameManager->addPlayerGuess($guess);

		}

		//Systemet presenterar ifall användaren gissat rätt eller inte 

		//Om användaren har gissat rätt systemet genererar ett nytt nummer

	}
}