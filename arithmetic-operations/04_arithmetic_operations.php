<?php


//Write a program to compute the product of integers from 1 to 10
// (i.e., 1×2×3×...×10), as an int.
// Take note that it is the same as factorial of N.

$num = 4;

function factorial($num)
{
    if ($num < 1) {
        return 1;
    } else return $num * factorial($num - 1);        //recursive function
}


//function factorial($num){
//    $result = 1;
//    for ($x = 1; $x<=$num; $x++){
//       $result = $result*$x;
//    }
//    return $result;
//}


echo(factorial($num));