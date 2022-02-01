<?php

class BankAccount
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
   {
       $this->name = $name;
       $this->balance = $balance;
   }

   public function getInfo():string
   {
       if ( $this->balance <0){
           return $this->name.", -$".
               number_format(abs($this->balance),2, ".", ",");
       }
       return $this->name.", $".
           number_format($this->balance,2, ".", ",");
   }
}

$ben = new BankAccount("Benson", 17.25);
$bob = new BankAccount("Bobby", -15577.25);

echo $ben->getInfo()."\n";
echo $bob->getInfo()."\n";