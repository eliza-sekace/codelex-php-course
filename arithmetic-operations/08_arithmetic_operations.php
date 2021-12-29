<?php


//Foo Corporation needs a program to calculate how much to pay their hourly employees.
// The US Department of Labor requires that employees get paid time
// and a half for any hours over 40 that they work in a single week.
// For example, if an employee works 45 hours, they get 5 hours of overtime,
// at 1.5 times their base pay. The State of Massachusetts requires that hourly employees
// be paid at least $8.00 an hour. Foo Corp requires that an employee not work more
// than 60 hours in a week.

function salaryCalculations($hoursWorked, $basePay)
{
    if ($basePay < 8.00) {
        return "Base pay should be at least 8.00";
    }
    if ($hoursWorked <= 40) {
        return $hoursWorked * $basePay . "$";

    } else if ($hoursWorked <= 60) {
        $overTime = $hoursWorked - 40;
        return $overTime * $basePay * 1.5 + ($hoursWorked - $overTime) * $basePay . "$";

    } else return "Please input valid amount of working hours";
}

echo "Employee 1: " . salaryCalculations(35, 7.50) . "\n";
echo "Employee 2: " . salaryCalculations(47, 8.20) . "\n";
echo "Employee 3: " . salaryCalculations(73, 10.00);
