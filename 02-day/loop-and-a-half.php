<?php

$collection = [];


while (true) {
    $collectible = readline("Enter collectible (q to exit): ");

    if ($collectible === 'q') {
        break;
    }

    $collection[] = $collectible;
    echo implode(" | ", $collection) . "\n";
}