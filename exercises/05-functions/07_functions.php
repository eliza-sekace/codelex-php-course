<?php


//Imagine you own a gun store.
// Only certain guns can be purchased with license types.
// Create an object (person) that will be the requester to purchase a gun (object)
// Person object has a name, valid licenses (multiple) & cash.
// Guns are objects stored within an array. Each gun has license letter, price & name.
// Using PHP in-built functions determine if the requester (person) can buy a gun
// from the store.

$person = new stdClass();
$person->name = "John";
$person->cash = 6000;
$person->validLicences = ['W', 'SG'];

function createWeapon(string $name, int $price, ?string $licenceLetter = null): stdClass
{
    $weapon = new stdClass();
    $weapon->name = $name;
    $weapon->licence = $licenceLetter;
    $weapon->price = $price;
    return $weapon;
}

$weapons = [
    createWeapon("Winchester", 5000, "W"),
    createWeapon("Shotgun", 2500, "SG"),
    createWeapon("Revolver", 1000, "R"),
    createWeapon("Knife", 1000)
];


//$shoppingBasket = [];
//$totalSum = 0;
$cart = [];

echo $person->name . " has " . $person->cash . "\n";
echo "Licences: " . implode(", ", $person->validLicences) . "\n\n";

$continueShopping = true;
while ($continueShopping) {
    foreach ($weapons as $index => $weapon) {
        echo $index . " " . $weapon->name . " " . $weapon->price . "$; licence:" . $weapon->licence . "\n";
    }

    $selectedWeaponIndex = readline("Select weapon: ");
    $weapon = $weapons[$selectedWeaponIndex] ?? null;

    if ($weapon === null) {
        echo "weapon not found";
    }

    if ($weapon->licence !== null && !in_array($weapon->licence, $person->validLicences)) {
        echo "Invalid licence to buy " . $weapon->name . " \n";

    } else {
        // $shoppingBasket[] = $weapon->name;
        echo "Added " . $weapon->name . " to basket \n\n";
        //$totalSum += $weapon->price;
        $cart[] = $weapon;
    };

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
            }
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
    foreach ($cart as $weapon) {
        $names[] = $weapon->name;
    }
    return $names;
}

function getSum($cart)
{
    $sum = 0;
    foreach ($cart as $weapon) {
        $sum += $weapon->price;
    }
    return $sum;
}

