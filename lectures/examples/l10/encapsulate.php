<?php


class ProductView {
	private $pc;

	public function __construct(ProductCatalog $pc) {
		$this->pc = $pc;
	}

	public function echoProductsOnSale() {
		$productsOnSale = $this->pc->getProducts("WHERE onSALE == true");

		echo "<ol>";
		foreach($productsOnSale as $p) {

			echo "<li> $p->title </li>";
		}
		echo "</ol>";
	}
}

class Product {
	public $title = "Title of Product";
	
	/**
	 * @var boolean
	 */
	public $onSale;
}

class ProductCatalog {
	private $dal;

	public function __construct(ProductDAL $storage) {
		$this->dal = $storage;
	}

	public function getProducts(string $whereSQL) : array {
		return $this->dal->selectAll($whereSQL);
	}
}

interface ProductDAL {
	public function selectAll(string $whereSQL) : array;
}


class ProductDB implements ProductDAL {
	public function selectAll(string $whereSQL) : array {
		$sql = "SELECT FROM 'Products' $whereSQL";

		return array(new Product(), new Product() ); //totally fejk
	}
}



class ProductFile implements ProductDAL {
	public function selectAll(string $whereSQL) : array {
		//????	
	}
}

$dal = new ProductDB();
$v = new ProductView(new ProductCatalog($dal));
$v->echoProductsOnSale();