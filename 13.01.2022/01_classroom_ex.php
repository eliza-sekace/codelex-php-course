<?php

class Person
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function sayHello():string
    {
        return "Hello ".$this->name;
    }
}

//lai uztaisitu obj - new
//new = jauns klases objekts

$x = new Person('John');
$y = new Person('Jane');
$z= new Person ('Joe');

var_dump($x, $y);

echo $x->sayHello().PHP_EOL;        //$x-objekta instance
echo $y->sayHello().PHP_EOL;
echo $z->sayHello().PHP_EOL;
