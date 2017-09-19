<?php

//kod från controller

//Två variabler som håller reda på tillståndsförrändringar
$didPay = false;
$didAdd = false;

//Hantera indata
if ($model->hasItemsInShoppingBasket() ) {
	if ($view->userWantsToCheckout()) {
		$model->doPayment();
		$didPay = $model->paymentWasSuccessful();
	}	
} 
if ($view->userAddsItemToBasket()) {
	$model->addItem($view->getAddedItem());
	$didAdd = true; //this cannot fail...
}


//genera utdata (echo)
if ($model->hasItemsInShoppingBasket() ) {
	$view->showStoreWithBasket($model->getBasket(), $didAdd);
} else {
	//Skicka
	$view->showStoreWithEmptyBasket($didPay);
}

class Model {
	private static $basket = "Model::basket";

	public function hasItemsInShoppingBasket() {
		return isset($_SESSION[Model::$basket]);
	}

	...
}

class View {
	private static $checkoutLink = "View::checkoutLink";

	public function userWantsToCheckout() {
		return isset($_REQUEST[View::$checkoutLink]);
	}

	public function showStoreWithEmptyBasket(bool $didPay) {
		echo "<h2..."
	}

	...
}