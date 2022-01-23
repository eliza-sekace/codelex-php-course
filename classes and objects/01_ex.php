<?php

class Product
{
    public string $name;
    private float $startPrice;
    private int $amount;

    public function __construct(string $name, float $startPrice, int $amount)
    {
        $this->name = $name;
        $this->startPrice = $startPrice;
        $this->amount = $amount;
    }

    public function setStartPrice($startPrice)
    {
        if ($startPrice > 0) {
            $this->startPrice = $startPrice;
        }
    }

    public function setAmount($amount)
    {
        if ($amount > 0) {
            $this->amount = $amount;
        }
    }

    public function printProduct()
    {
        return ('"' . $this->name . '"' . " " . $this->startPrice . " EUR " . $this->amount . " units");
    }
}

$logitech = new Product("Logitech mouse", 70.00, 14);
$iphone = new Product("iPhone 5s", 999.99, 3);
$epson = new Product("Epson EB-U05", 440.46, 1);

$logitech->setStartPrice(55);
$iphone->setAmount(4);


echo $logitech->printProduct() . "\n";
echo $iphone->printProduct() . "\n";
echo $epson->printProduct();


