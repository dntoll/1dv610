<?php

//kod från controller
//Två variabler som håller reda på tillståndsförändringar
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