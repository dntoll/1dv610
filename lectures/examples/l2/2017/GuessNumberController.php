<?php

namespace controller;

class GuessNumberController {

	private $view;
	private $secret;

	public function __construct(\view\GuessNumberView $view, \model\SecretNumber $model) {
		$this->view = $view;
		$this->secret = $model;
	}

	public function doPlayGame() {
		
		$this->view->showFormAndTitle();
		try {
			

			if ($this->view->userHasGuessed()) {
				$this->view->showGuess();

				$guess = $this->view->getGuessedNumber();

				if ($guess->isSameAs($this->secret)) {
					$this->view->showSuccess();
				} else {
					$this->view->showHint($this->secret);
				}
			}
		} catch (\model\NotNumberException $e) {
			$this->view->showNotANumberError();
		} catch (\model\NotInRangeException $e) {
			$this->view->showNotInRangeError();
		}
	}
}