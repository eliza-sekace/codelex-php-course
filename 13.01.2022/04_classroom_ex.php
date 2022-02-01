<?php

//auto salons - kuraa ieksaa automasiinas
//sistema,kuraa iespeja automasinu rezerveet
//redzam sarakstu, readline varam izveleties konkretu auto
//tad ieliekas rezerveto sarakstaa
//pec tam izvadaas atlikusaas pieejamaas un rezerveetaas

class Car
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;

    }
}


class CarShop
{
    public array $availableCars;
    public array $reservedCars;

    public function __construct(array $cars = [])
    {
        $this->availableCars = $cars;
    }

    public function add(Car $car): void
    {
        $this->availableCars[] = $car;
    }

    public function remove(Car $car)
    {
        foreach ($this->availableCars as $key=>$availableCar){
            if($availableCar->name === $car->name){
                unset($this->availableCars[$key]);
            }
        }
    }

    public function reserve(Car $car)
    {
        $this->remove($car);
        $this->reservedCars[] = $car;
    }

    public function findCar(string $name)
    {
        foreach ($this->availableCars as $car) {
            if (strtolower($car->name) === strtolower($name)) {
                return $car;
            }
        }
    }
}

$carShop = new CarShop([
    new Car('Audi TT'),
    new Car('BMW e46'),
    new Car('Mazda 3')
]);


while (readline("continue? Y/N") !== "n") {
    echo "Available cars: \n";
    foreach ($carShop->availableCars as $car) {
        echo $car->name . "\n";
    }

    $chosenCar = readline("Which car you want to reserve?: ");
    $car = $carShop->findCar($chosenCar);
    if ($car){
        $carShop->reserve($car);
    } else{
        echo "Chosen car ".$chosenCar." is not available";
    }

    var_dump($carShop);
}
var_dump($carShop);
