<?php


$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

$userInput = readline("Enter the value to search for: ");
if (in_array($userInput, $numbers)) {
    echo "Number " . $userInput . " is in the array";
} else {
    echo "Number you entered is not in the array";
}

//todo check if an array contains a value user entered