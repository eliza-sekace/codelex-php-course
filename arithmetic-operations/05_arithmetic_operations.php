<?php

//Write a program that picks a random number from 1-100.
// Give the user a chance to guess it.
// If they get it right, tell them so.
// If their guess is higher than the number, say "Too high."
// If their guess is lower than the number, say "Too low." Then quit.
// (They don't get any more guesses for now.)

$randomNum = rand(1, 100);
$guessCount = 0;
while ($guessCount < 2) {
    $userInput = readline("I'm thinking of a number between 1-100.  Try to guess it! "); //returns string
    if ($userInput == $randomNum) {
        echo 'You guessed it!  What are the odds?!?';
        $guessCount = 2;
    } else if ($userInput < $randomNum) {
        echo 'Sorry, too low.' . "\n";
    } else if ($userInput > $randomNum) {
        echo 'Sorry, too high' . "\n";
    }
    $guessCount++;
}
echo('The number was ' . $randomNum);
