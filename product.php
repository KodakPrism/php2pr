<?php

class Product {
    public $id;
    public $name;
    public $category;
    public $price;

    public function __construct($id, $name, $category, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
    }
}
?>

<?php

class Catalog {
    private $products = [];

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function getProducts() {
        return $this->products;
    }

    public function filterAndSearch($searchQuery, $filterCategory) {
        $filteredProducts = $this->products;

        if (!empty($searchQuery)) {
            $filteredProducts = array_filter($filteredProducts, function($product) use ($searchQuery) {
                return stripos($product->name, $searchQuery) !== false;
            });
        }

        if (!empty($filterCategory)) {
            $filteredProducts = array_filter($filteredProducts, function($product) use ($filterCategory) {
                return $product->category === $filterCategory;
            });
        }

        return $filteredProducts;
    }
}
?>
