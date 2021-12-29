<?php

//Design a Geometry class with the following methods:

//A static method that accepts the radius of a circle and returns the area of the circle.
// Use the following formula: Area = π * r * 2
//Use Math.PI for π and r for the radius of the circle

//A static method that accepts the length and width of a rectangle and returns the
// area of the rectangle. Use the following formula: Area = Length x Width

//A static method that accepts the length of a triangle’s base and the triangle’s height.
// The method should return the area of the triangle. Use the following formula:
//Area = Base x Height x 0.5

//The methods should display an error message if negative
// values are used for the circle’s radius, the rectangle’s length or width,
// or the triangle’s base or height.

class Geometry
{
    public static function circleArea($radius)
    {
        if ($radius > 0) {
            return round(M_PI * $radius ** 2, 1);
        } else return 'Invalid number';
    }

    public static function rectangleArea($length, $width)
    {
        if ($length > 0 && $width > 0) {
            return $length * $width;
        } else return 'Invalid number';
    }

    public static function triangleArea($base, $length)
    {
        if ($base > 0 && $length > 0) {
            return $base * $length * 0.5;
        } else {
            return 'Invalid number';
        }
    }
}

echo Geometry::circleArea(4) . "\n";
echo Geometry::rectangleArea(4, 5) . "\n";
echo Geometry::triangleArea(3, 4);