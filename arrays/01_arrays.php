<?php


$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];


echo "Original numeric array: " . implode(" ", $numbers) . "\n";

sort($numbers);
echo "Sorted numeric array: " . implode(" ", $numbers) . "\n";

$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

//todo
echo "Original string array: " . implode(", ", $words) . "\n";

//todo
sort($words);
echo "Sorted string array: " . implode(", ", $words);