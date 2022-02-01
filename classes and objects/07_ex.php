<?php

class Dog
{
    private string $name;
    private string $sex;
    private string $mother;
    private string $father;

    public function __construct(string $name, string $sex, string $mother = "Unknown", string $father = "Unknown")
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = $mother;
        $this->father = $father;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSex()
    {
        return $this->sex;
    }

    public function getMother()
    {
        return $this->mother;
    }

    public function getFather()
    {
        return $this->father;
    }

    public function hasSameMotherAs(Dog $dog): string
    {
        if ($this->mother === $dog->getMother()) {
            return "True";
        } else return "False";
    }
}

class DogTest
{
    private array $dogs;

    public function __construct(array $dogs)
    {
        $this->dogs = $dogs;
    }

    public function getDogs()
    {
        return $this->dogs;
    }

}

$dogs = new DogTest([
    $max = new Dog("Max", "male", "Lady", "Rocky"),
    $rocky = new Dog("Rocky", "male", "Molly", "Sam"),
    $sparky = new Dog("Sparky", "male"),
    $buster = new Dog("Buster", "male", "Lady", "Sparky"),
    $sam = new Dog("Sam", "male"),
    $lady = new Dog("Lady", "female"),
    $molly = new Dog("Molly", "female"),
    $coco = new Dog("Coco", "female", "Molly", "Sparky"),
]);

foreach ($dogs->getDogs() as $dog) {
    echo "Name: " . $dog->getName() . ", sex: " . $dog->getSex() .
        ", mother: " . $dog->getMother() . " father: " . $dog->getFather() . "\n";
}

echo "\n";

echo $coco->getName()." has same mother as ".$rocky->getName().": ".$coco->hasSameMotherAs($rocky)."\n";
echo $buster->getName()." has same mother as ".$rocky->getName().": ".$buster->hasSameMotherAs($rocky);





