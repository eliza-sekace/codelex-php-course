<?php

//Write a program to produce the sum of 1, 2, 3, ..., to 100.
// Store 1 and 100 in variables lower bound and upper bound,
// so that we can change their values easily.
// Also compute and display the average. The output shall look like:
//
//The sum of 1 to 100 is 5050
//The average is 50.5

$lowerNum = 1;
$upperNum = 100;

function sum($lowerNum, $upperNum)
{
    $sumOfIntegers = array_sum(range($lowerNum, $upperNum));

    $average = ($lowerNum + $upperNum) / 2;

    return
        'The sum of ' . $lowerNum . ' to ' . $upperNum . ' is ' . $sumOfIntegers . "\n" .
        'The average is ' . $average;
}

echo(sum($lowerNum, $upperNum));
