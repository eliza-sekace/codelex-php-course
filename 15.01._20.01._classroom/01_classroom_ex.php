<?php
//personu reģistrs
//ir iespejams ievadit persona vardu, uzvardu un personas kodu
//oop pievienot jaunu personu
//shis izveido jaunu personu un ievieto registraa
//vel var redzeet pašu reģistru


class Person
{
    private string $name;
    private string $surname;
    private string $personId;

    public function __construct(string $name, string $surname, int $personId)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->personId = $personId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getPersonId()
    {
        return $this->personId;
    }
//    public function setPersonId($list, $personId)
//    {
//        foreach ($list as $person) {
//            if (in_array($this->personId, $list)) {
//                echo "person with this identification number already exists";
//            } else
//                $this->personId = $personId;
//        }
//
//    }
}

class Registry
{
    public array $list;

    public function addToList(Person $person): void
    {
        $this->list[] = $person;
    }
}

$list = new Registry();

$continue = readline("press 1 to add person, press 2 to see register");
while ($continue) {
    if ($continue == 1) {
        $name = readline("add name: ");
        $surname = readline("add surname: ");
        $id = readline("add ID number: ");
        $person = new Person($name, $surname, $id);
        $list->addToList($person);
    }
    if ($continue == 2) {
        foreach ($list->list as $person) {
            echo $person->getName() . "  " . $person->getSurname() . " ID number:" . $person->getPersonId() . "\n";
        }
    }
    $continue = readline("press 1 to add person, press 2 to see register, 3 to EXIT\n");
    if ($continue == "3") {
        exit;
    }
}
