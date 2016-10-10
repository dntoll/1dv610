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

	public function echoProduct(Product $p) {
		$title = $p->getTitle();
		echo "
			<h2>The Title is : $title</h2>
			<form>

				Title:<input type='text' name='Tit1e' value='$title'/> 
				<input type='submit' value='Submit'>
			</form>";
	}
}

//controller
class ProductAdminController {
	public function changeTitles($m) {
		if (isset($_GET['Title'])) {
			$m->setTitle($_GET['Title']); 
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