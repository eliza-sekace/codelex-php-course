<?php

//objekts "weapon" - nosaukums un speeks
//cits objekts - inventory
//caur konstruktoru - vairaki objekti
//inventory objekts
//vairaki weapon
//inventory ievieto weapons
//masiivs inventory objektaa

class Weapon
{
    public string $name;
    public int $power;

    public function __construct(string $name, int $power)
    {
        $this->name = $name;
        $this->power = $power;
    }

    public function name()
    {
        return $this->name;
    }
    public function power()
    {
        return $this->power;
    }
}

$knife = new Weapon('Knife', 20);
$gun = new Weapon('Gun', 50);
$shotGun = new Weapon('Shotgun', 75);


class Inventory
{
    public array $inventory;

    public function add(Weapon $weapon){
        return $this->inventory[] = $weapon;
    }

}
$inventory = new Inventory();
$inventory->add($gun);
$inventory->add($knife);
$inventory->add($shotGun);

foreach ($inventory->inventory as $item){
    echo $item->name ." ". $item->power ."\n";
}
//var_dump($inventory);
