<?php

$weapons = [
    1 => 'rock',
    2 => 'paper',
    3 => 'scissors',
    4 => 'lizard',
    5 => 'spock'
];
$userChoice = readline("Choose your weapon! 1 for rock, 2 for paper, 3 for scissors, 4 for lizard, 5 for spock");
$pcChoice = rand(1, 3);

$userChoiceSaved = 'User Chose ' . $weapons[$userChoice] . "\n";
$pcChoiceSaved = 'PC chose: ' . $weapons[$pcChoice] . "\n";

echo $userChoiceSaved;
echo $pcChoiceSaved;

$winningCombos = [
    1 => [3,4],
    2 => [1,5],
    3 => [2,4],
    4 => [5,2],
    5 => [3,1]
];

if (in_array($pcChoice, $winningCombos[$userChoice])) {
    $result = "Player wins!\n";
} elseif (in_array($userChoice,$winningCombos[$pcChoice])) {
    $result = "PC wins!\n";
} else {
    $result = "It's a tie!\n";
}
echo $result;
$data = [$userChoiceSaved, $pcChoiceSaved, $result];

//save results:

$filename = 'saved_results.csv';
$f = fopen($filename, 'a');
if ($f === false) {
    die('Error opening the file ' . $filename);
}

file_put_contents($filename, $data, FILE_APPEND);
fclose($f);
