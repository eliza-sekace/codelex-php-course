<?php

//Create an associative array with objects of multiple persons.
//Each person should have a name, surname, age and birthday.
// Using loop (by your choice) print out every persons personal data.

$humans = [
    ["name" => "John",
        "surname" => "Doe",
        "age" => 30,
        "birthday"=>"January"
    ],
    ["name" => "Jane",
        "surname" => "Doe",
        "age" => 30,
        "birthday"=>"December"
    ]
];

foreach($humans as $human){
    echo "Name: ".$human["name"]. " ".
        $human["surname"].", ".
       "age: ". $human["age"].", ".
        "birthday month: ".$human["birthday"]. "\n";
}