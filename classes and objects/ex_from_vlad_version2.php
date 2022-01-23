<?php

/**
 * Create a program about Gardening
 *
 * Our garden may consist of several plants.
 * These may be of different categories - for example, tropical plant, flower, vegetable.
 * The garden also may contain weeds and bugs.
 *
 * The plant may have such properties as name, watering frequency etc.
 *
 */

class Garden
{
    private array $plants;

    public function __construct(array $plants = [])
    {
        $this->plants = $plants;
    }

    public function add(Plant $plant)
    {
        $this->plants[] = $plant;
    }

    public function getPlants(): array
    {
        return $this->plants;
    }
}

abstract class Plant
{
    public string $name;
    private int $wateringPerWeek;
    private string $size;
    private array $bugs = [];

    public function __construct(string $name, int $wateringPerWeek, string $size)
    {
        $this->name = $name;
        $this->wateringPerWeek = $wateringPerWeek;
        $this->size = $size;
    }

    function getName()
    {
        return $this->name;
    }

    function getWateringSchedule()
    {
        return $this->wateringPerWeek;
    }

    function getSize()
    {
        return $this->size;
    }

    function setWateringPerWeek($wateringPerWeek)
    {
        $this->wateringPerWeek = $wateringPerWeek;
    }

    public function add(Bug $bug)
    {
        $this->bugs[] = $bug;
    }

    public function getBugs(): array
    {
        return $this->bugs;
    }

    public function hasBugs(): bool
    {
        return count($this->bugs) > 0;
    }

    public function removeBugs()
    {
        $this->bugs = [];
    }

    public function getBugNames()
    {
        $bugnames=[];
        foreach ($this->bugs as $bug){
            $bugnames[]=$bug->getName();
        }
        return$bugnames;
    }
}

class Tropical extends Plant
{

}

class Poisonous extends Plant
{

}

class Eatable extends Plant
{
    private string $taste;

    public function __construct(string $name, int $wateringPerWeek, string $size, string $taste)
    {
        parent::__construct($name, $wateringPerWeek, $size);
        $this->taste = $taste;
    }

    public function getTaste()
    {
        return $this->taste;
    }
}


class Bug
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

$garden = new Garden([
    new Tropical("Monstera Deliciosa", 1, "large"),
    new Tropical("Monstera Adansonii", 1, "small"),
    new Poisonous("Poisonous Ivy", 2, "medium"),
    new Tropical("Patchira Aquatica", 2, "Large"),
    new Eatable("Cabbage", 1, "small", "tasty")
]);

foreach ($garden->getPlants() as $plant) {

    if ($plant instanceof Poisonous) {
        $plant->add(new Bug("Bugzzy"));
    }
    if ($plant instanceof Eatable) {
        $plant->add(new Bug("Bugzzo"));
        $plant->add(new Bug("Bugzzitoo"));
    }

    foreach ($plant->getBugs() as $bug) {
        $bugname = $bug->getName() . "\n";
    }
    echo $plant->getName() . " " . ($plant->hasBugs() ? " has " .
            implode(" & ", $plant->getBugNames()) : " is clean") . "\n";
}
echo "\n";
foreach ($garden->getPlants() as $plant) {
    if ($plant->hasBugs()) {
        $plant->removeBugs();
    }
    echo $plant->getName() . " " . ($plant->hasBugs() ? " has bugz" : " is clean") . "\n";
}

