<?php


//Write a program called CheckOddEven which prints "Odd Number"
// if the int variable “number” is odd, or “Even Number” otherwise.
// The program shall always print “bye!” before exiting.


function checkOddEven($number)
{
    if ($number % 2 == 0) {
       $result= 'Even number';
    } else {
        $result='Odd number';
} return $result;
}

echo(checkOddEven(16) . "\n" . 'bye!');