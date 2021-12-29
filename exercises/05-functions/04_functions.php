<?php

//Create an array of objects that uses the function of exercise
// 3 but in loop printing out if the person has reached age of 18.

//require '08_03_functions.php';

$age = intval(readline('Enter age '));
function grownUp($person, $age)
{
    if ($person->age >= $age) {
        return $person->name . " has reached age of ".$age;
    } else {
        return $person->name . " has not reached age of ".$age;
    }
}

function createPerson(string $name, int $age):stdClass
{
    $person = new stdClass();
    $person->name = $name;
    $person->age = $age;
    return $person;
};


$persons = [
    createPerson('John', 25),
    createPerson('Jane', 15)
];


foreach ($persons as $person) {
    echo grownUp($person, $age) . "\n";
}



