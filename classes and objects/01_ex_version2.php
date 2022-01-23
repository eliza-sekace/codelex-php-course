<?php

class Product
{
    public $name;
    public $startprice;
    public $amount;

    public function __construct(string $name, float $startPrice, int $amount)
    {
        $this->name = $name;
        $this->startprice = $startPrice;
        $this->amount = $amount;
    }

    public function printProduct()
    {
        return ('"' . $this->name . '"' . " " . $this->startprice . " EUR " . $this->amount . " units");
    }
}

class ProductList
{
    private array $list;

    public function __construct(array $products=[])
    {
        $this->list = $products;
    }

    public function add(Product $product): void
    {
        $this->list[] = $product;
    }

    public function all():array
    {
        return $this->list;
    }
}

$productList = new ProductList([
    new Product("Logitech mouse", 70.00, 14),
    new Product("iPhone 5s", 999.99, 3),
    new Product("Epson EB-U05", 440.46, 1)
]);

//pievienot jaunus - ar add funkciju;

foreach ($productList->all() as $product) {
    echo $product->printProduct() . "\n";       //vai var izsaukt printProduct??
}


