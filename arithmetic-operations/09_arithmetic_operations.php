<?php


//Write a program that calculates and displays a person's body mass index (BMI).
// A person's BMI is calculated with the following formula:
// BMI = weight x 703 / height ^ 2.
// Where weight is measured in pounds and height is measured in inches.
// Display a message indicating whether the person has optimal weight,
// is underweight, or is overweight. A sedentary person's weight is considered optimal
// if his or her BMI is between 18.5 and 25. If the BMI is less than 18.5,
// the person is considered underweight. If the BMI value is greater than 25,
// the person is considered overweight.
//Your program must accept metric units.


$weight = $userInput = readline("Input your weight (kg): "); //pounds
$height = $userInput = readline("Input your height (m): "); //inches
$weightToPounds = $weight * 2.20462;
$heightToInches = $height * 39.3701;

$bmi = round($weightToPounds *703 / ($heightToInches ** 2), 1);

if ($bmi < 18.5) {
    echo " Your BMI is: " . $bmi . " You are underweight.";
} else if ($bmi >= 18.5 && $bmi <= 25) {
    echo " Your BMI is: " . $bmi . " You have optimal weight.";
} else if ($bmi > 25) {
    echo " Your BMI is: " . $bmi . " You are overweight.";
}
