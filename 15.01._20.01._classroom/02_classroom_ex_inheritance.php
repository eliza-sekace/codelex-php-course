<?php

//klase Shape
//Klase shape padod info par laukuma aprekinasanu
//Klases - square, triangle, circle
//katrā precizē laukuma aprēķināšanas formulu
//nepieciešamos datus padod lauciņā, kad izsauc metodi
//Next - jauna klase ar metodi, kas aprekina visu laukumu summu.To izvada ārā
//Next -lietotājs var ievadīt, ko grib izveidot (kv, apli, trisst),
//tad ievada vajadzīgos parametrus - garumu, radiusu utt.
//tad var turpinat ievadit jaunu vai uzreiz apskatīt laukumu summu.

abstract class Shape
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName($name)
    {
        return $this->name = $name;
    }


    public function getArea():float
    {
        return pow($this->length, 2);
    }
}

class Square extends Shape
{
    protected $length;

    public function __construct(string $name, int $length)
    {
        parent::__construct($name);
        $this->length = $length;
    }

    public function getArea(): float
    {
        return pow($this->length, 2);
    }

}

class Triangle extends Shape
{
    protected $base;

    protected $height;

    public function __construct(string $name, float $base, float $height)
    {
        parent::__construct($name);
        $this->base = $base;
        $this->height = $height;
    }

    function getArea():float
    {
        return .5 * $this->base * $this->height;
    }
}

class Circle extends Shape
{
    protected float $radius;

    public function __construct(string $name, float $radius)
    {
        parent::__construct($name);
        $this->radius = $radius;
    }

    function getArea():float
    {
        return pi() * pow($this->radius, 2);
    }
}

class ShapesCalculator
{
    private array $shapes;

    public function add(Shape $shape): void         //uztaisīt $shape??
    {
        $this->shapes[] = $shape;
    }

    public function sumArea(): float
    {
        $result = 0;
        foreach ($this->shapes as $shape) {
            $result += $shape->getArea();
        }
        return $result;
    }
}

$calculator = new ShapesCalculator();

$continue = readline("press 1 to add square, press 2 to add triangle, 3 to add circle");
while (true) {
     if ($continue == 1) {
        $name = readline("add name: ");
        $length = readline("add side length: ");
        $calculator->add(new Square($name, $length));
        echo "Sum: ".round(($calculator->sumArea()),2) . "\n";
    }
    if ($continue == 2) {
        $name = readline("add name: ");
        $base = readline("add triangle base: ");
        $height = readline("add triangle height: ");
        $calculator->add(new Triangle($name, $base, $height));
        echo "Sum: ".round(($calculator->sumArea()),2) . "\n";
    }

    if ($continue == 3) {
        $name = readline("add name: ");
        $radius = readline("add circle radius: ");
        $calculator->add(new Circle($name, $radius));
        echo "Sum: ".round(($calculator->sumArea()),2) . "\n";
    }
    if ($continue == 4) {
       exit;
    }
    $continue = readline("press 1 to add square, press 2 to add triangle, 3 to add circle, 4 to EXIT");
}