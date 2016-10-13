<?php

//model
class Product {
	private $title = "ExampleProduct";

	public function getTitle() : string {
		return $this->title;
	}

	public function setTitle($newTitle) {
		$this->title = $newTitle;
	}
}

//view
class ProductView {

	private $TITLE_IN_URL = "ProductView::title";

	public function echoProduct(Product $p) {
		$title = $p->getTitle();
		echo "
			<h2>The Title is : $title</h2>
			<form method='post'>

				Title:<input type='text' name='$this->TITLE_IN_URL' value='$title'/> <!--dep -->
				<input type='submit' value='Submit'>
			</form>";
	}

	public function adminSubmitsTitle() : bool{
		return isset($_POST[$this->TITLE_IN_URL]);
	}

	public function getTitle() : string {
		return $_POST[$v->TITLE_IN_URL];
	}
}

//controller
class ProductAdminController {
	public function changeTitles($m) {
		$v = new ProductView();
		if ($v->adminSubmitsTitle()) { //dep
			$newTitle = $v->getTitle();
			$m->setTitle($newTitle); //dep
		}
	}
}


class RouterController {
	public function __construct() {
		$m = new Product();
		$v = new ProductView();
		$c = new ProductAdminController();

		$c->changeTitles($m);
		$v->echoProduct($m);
	}
}


//index.php
new RouterController();