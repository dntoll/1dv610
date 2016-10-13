<?php


public class Product {

	public function __construct(string $title, int $price) {
		...
	}
}

public class ProductController {
	public function adminChangeProduct() {
		$p = $pv->getProduct();
		$this->productCatalog->add($p);
	}
}

public class ProductView {
	private static $titleField = "ProductView::title";
	private static $priceField = "ProductView::price";

	private $message = "";

	private function handlePriceNotSet() {
		$this->message = "You need to supply a price!"
	}

	public function showMessage() {
		echo $this->message;
	}

	public function getProduct() : Product {
		if (isset($_POST[self::$priceField]) == false) {
			$this->handlePriceNotSet();
			throw new \Exception("Price not set");
		}

		...
			
		$price = intval($_POST[self::$priceField]);
		$p = new Product($_POST[self::$titleField], $price);
		return $p;
	}
}