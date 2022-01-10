<?php

//import products:
function createProduct($index, $name, $price, $category, $description, $expiryDate, $amount)
{
    $product = new stdClass();
    $product->index= $index;
    $product->name = $name;
    $product->price = $price;
    $product->category = $category;
    $product->description = $description;
    $product->expirydate = $expiryDate;
    $product->amount = $amount;
    return $product;
}

$productFile = 'products.csv';
$products = [];

if (($h = fopen("{$productFile}", "r")) !== FALSE) {
    $index=0;
    while (($data = fgetcsv($h, 50, ",")) !== FALSE) {
        [$name, $price, $category, $description, $expiryDate, $amount] = $data;
        $products[] = createProduct($index, $name, $price, $category, $description, $expiryDate, $amount);
    $index++;
    }
    fclose($h);
}


//import person data:
$personData = explode(',', file_get_contents('person.txt'));
$person = new stdClass();
$person->name = $personData[0];
$person->cash = (int)$personData[1];

echo $person->name . " has " . $person->cash . "\n";


$cart = [];
$savedCart = explode(',', file_get_contents('savedCart.txt'));
echo "Products in your saved cart: ";
foreach ($savedCart as $productIndex) {
    echo $products[$productIndex]->name . "\n";
}
if (strtoupper(readline("Press K to keep your saved cart, D to delete")) != "D") {
    foreach ($savedCart as $productIndex) {
        echo $products[$productIndex]->name . "\n";
        $cart[] = $products[$productIndex];
    }
} else {
    $cart = [];
}


$continueShopping = true;
while ($continueShopping) {
    foreach ($products as $index => $product) {
        echo $index . " " . $product->name . " " . $product->price . "$ | Left:" . $product->amount . "\n";
    }

    $selectedProductIndex = readline("Select product: ");
    $product = $products[$selectedProductIndex] ?? null;

    if ($product === null) {
        echo "product not found";
    } else if ($product->amount == 0) {
        echo "sorry, we are out of " . $product->name . "\n";
    } else {
        // $shoppingBasket[] = $product->name;
        echo "Added " . $product->name . " to basket \n\n";
        //$totalSum += $product->price;
        $cart[] = $product;
    };


    file_put_contents('savedCart.txt', implode(',', getCartIndexes($cart) ));


    echo "Items in your shopping basket: " . implode(", ", getNames($cart)) . "\n";
    // echo "Items in your shopping basket: " . implode(", ", $shoppingBasket) . "\n";
    echo "Sum of your shopping basket: " . getSum($cart) . "\n";
    // echo "Sum of your shopping basket: " . $totalSum . "\n";
    if (strtoupper(readline("continue shopping? Y/N")) === "N") {
        $continueShopping = false;
    }
}

if (strtoupper(readline("Go to cart and BUY? Y/N")) === "Y") {
    if ($person->cash >= getSum($cart)) {
        echo "You bought " . implode(", ", getNames($cart)) . "\n";
    } else {
        while ($person->cash < getSum($cart)) {
            echo "Not enough cash!";
            if (strtoupper(readline("Do you wish to take something off your cart? Y/N")) === "Y") {
                echo "Your cart: \n";
                foreach ($cart as $index => $names) {
                    echo $index . " " . $names->name . "\n";

                }
                $cartProductIndex = readline("Which product you want to delete?: ");
                unset($cart[$cartProductIndex]);
            } else exit;
            echo "Your cart: " . implode(", ", getNames($cart)) . "\n";
            if ($person->cash >= getSum($cart)) {
                echo "Now you can buy everything in cart";
            }
        }
    }
}


function getNames($cart)
{
    $names = [];
    foreach ($cart as $product) {
        $names[] = $product->name;
    }
    return $names;
}

function getSum($cart)
{
    $sum = 0;
    foreach ($cart as $product) {
        $sum += $product->price;
    }
    return $sum;
}

function getCartIndexes($cart)
{
    $indexes=[];
    foreach ($cart as $product) {
       $indexes[] = $product->index;
    }
    return $indexes;
}
