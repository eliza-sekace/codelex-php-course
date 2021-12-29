<?php

//Write a program to play a word-guessing game like Hangman.
//It must randomly choose a word from a list of words.
//It must stop when all the letters are guessed.
//It must give them limited tries and stop after they run out.
//It must display letters they have already guessed
// (either only the incorrect guesses or all guesses).

function isWin($randomWord, $output){
    return implode($randomWord) == implode($output);
}

$listOfWords = ['bookworm', 'nightclub', 'syndrome', 'beekeeper', 'witchcraft'];
$randomWord = str_split($listOfWords[array_rand($listOfWords)]);
$output = [];
$userGuess = '';
echo implode($randomWord);
$misses = [];
$guesses = [];


for ($i = 0; $i < count(($randomWord)); $i++) {
    $output[] = "_";
};


while (count($misses) < 5 && !isWin($randomWord, $output)) {
    $userGuess = readline('Guess the word!' . "\n" . "The word is: " . implode(" ", $output));
    $preGuess = $output;
    for ($i = 0; $i < count(($randomWord)); $i++) {
        if ($randomWord[$i] == $userGuess) {
            $output[$i] = $userGuess;
        }
    }
    if (implode($preGuess) === implode($output)) {
        $misses[] = $userGuess;
    } else {
        $guesses[] = $userGuess;
    }

    echo implode(" ", $output) . "\n";
    echo "Guesses: " . implode(", ", $guesses) . "\n";
    echo "Misses: " . implode(", ", $misses) . "\n";
}

if (isWin($randomWord,$output)){
    echo "You won!";
} else{
    echo "You are out of guesses! You lost!";
}




