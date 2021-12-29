<?php


//Write a program to accept two integers and return true
//if the either one is 15 or if their sum or difference is 15.

function test($x, $y)
{
    if ($x == 15 || $y == 15 || $x + $y == 15 || abs($x - $y) == 15) {
        return 'true';
    } else return 'false';
}

echo(test(16, 100));
