<?
class CatalogProduct {
    public $name;
    public $category;

    public function __construct($name, $category) {
        $this->name = $name;
        $this->category = $category;
    }
}


class Catalogprod {
    private $products = [];

    public function addProduct(Product $product): void {
        $this->products[] = $product;
    }

    public function getProducts(): array {
        return $this->products;
    }

    public function searchProducts(string $query): array {
        return array_filter($this->products, function(Product $product) use ($query) {
            return stripos($product->name, $query) !== false;
        });
    }

    public function filterProductsByCategory(string $category): array {
        return array_filter($this->products, function(Product $product) use ($category) {
            return $product->category === $category;
        });
    }

    public function filterAndSearch(string $query, ?string $category): array {
        $filtered = $this->products;

        if ($category) {
            $filtered = $this->filterProductsByCategory($category);
        }
        
        if ($query) {
            $filtered = $this->searchProducts($query);
        }

        return $filtered;
    }
}
?>