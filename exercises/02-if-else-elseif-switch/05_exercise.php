<?php

//Given variable (int) 50 create a condition that prints out "correct"
// if the variable is inside the range.
//Range should be stored within the 2 separated variables $y and $z.

$y = 75;
$z = 50;
$x = 55;

if ($x >= $y && $x <= $z || $x <= $y && $x >= $z) {
    echo $x . ' is in range of ' . $z . ' and ' . $y;
} else echo $x . ' is not in range of ' . $z . ' and ' . $y;
