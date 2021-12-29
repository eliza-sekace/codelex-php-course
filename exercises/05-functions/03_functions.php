<?php

//Create a person object with name, surname and age.
// Create a function that will determine if the person has reached 18 years of age.
// Print out if the person has reached age of 18 or not.


$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = 50;

function grownUp($person){
    if ($person->age >= 18){
       $result= $person->name. " has reached age of 18";
    } else {
        $result= $person->name . " has not reached age of 18";
    }
    return $result;
}

echo grownUp($person);
