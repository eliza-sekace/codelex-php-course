<?php

//veikals - produkti, kam nosaukums, cena, daudzums
//jaizdrukaa visi produkti kopaa
//funkcija, kas aprekina kopeejo produktu cenu un daudzumu

class Product
{
    public string $name;
    public int $price;
    public int $count;

    public function __construct(string $name, int $price, int $count)
    {
        $this->name = $name;
        $this->price = $price;
        $this->count = $count;
    }

}

$apple = new Product('Apple', 1, 50);
$orange = new Product('Orange', 2, 70);
$watermelon = new Product('Watermelon', 3, 20);

class Shop
{
    public array $shop;

    public function add(Product $product):void
    {
       $this->shop[] = $product;
    }

    public function sum():int
    {
        $sum = 0;
        foreach ($this->shop as $item) {
            $sum += $item->price * $item->count;
        }
        return $sum;
    }

}

$shop = new Shop();
$shop->add($apple);
$shop->add($orange);
$shop->add($watermelon);

foreach ($shop->shop as $item) {
    echo $item->name . ", price: " . $item->price . ", count: " . $item->count . "\n";
}

echo "---------------------------\n";
echo "Sum of all products: " . $shop->sum();

