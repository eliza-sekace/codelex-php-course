<?php

//Create a 2D associative array in 2nd dimension with fruits and their weight.
//Create a function that determines if fruit has weight over 10kg.
// Create a secondary array with shipping costs per weight.
// Meaning that you can say that over 10 kg shipping costs are 2 euros,
// otherwise its 1 euro. Using foreach loop print out the values of the fruits and
// how much it would cost to ship this product.

function getWeightCategory($fruit)
{
    if ($fruit['weight'] > 10) {
        return 'heavy';
    } else {
        return 'light';
    }
}

$fruits = [
    [
        'name' => 'banana',
        'weight' => 2
    ],
    [
        'name' => 'watermelon',
        'weight' => 15
    ],
];

$shippingCosts = [
    'heavy' => 2,
    'light' => 1
];

foreach ($fruits as $fruit) {
    echo 'Fruit: '.$fruit['name'] . ", ".
        'weight: '.$fruit['weight'] . ", ".
    'shipping cost: '.$shippingCosts[getWeightCategory($fruit)]."\n";
}
