<?php

namespace controller;

class GuessNumberController {



	public function doPlayGame() {
		
		$view = new \view\GuessNumberView();

		$view->showFormAndTitle();

		$secret = new \model\SecretNumber();

		try {
			

			if ($view->userHasGuessed()) {
				$view->showGuess();

				$guess = $view->getGuessedNumber();

				if ($guess->isSameAs($secret)) {
					$view->showSuccess();
				} else {
					$view->showHint($secret);
				}
			}
		} catch (\model\NotNumberException $e) {
			$view->showNotANumberError();
		} catch (\model\NotInRangeException $e) {
			$view->showNotInRangeError();
		}
	}
}