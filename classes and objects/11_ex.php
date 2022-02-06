<?php

class Account
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

   public function withdraw($amount):void
   {
       $this->balance-=$amount;
   }

    public function deposit($amount):void
    {
        $this->balance+=$amount;
    }

    public function transfer (Account $to, int $amount):void
    {
        if ($this->balance >=$amount) {
            $this->balance -= $amount;
            $to->balance += $amount;
        }
    }
}

$matt = new Account("Matt's account", 1000.00);
$myAcc= new Account("My account", 0.00);
$friend = new Account("Friends account", 0.00);

echo "Initial state: \n";
echo $matt->getInfo()."\n";
echo $myAcc->getInfo()."\n";
echo $friend->getInfo()."\n";

$matt->transfer($myAcc,500);
$myAcc->transfer($friend, 250);

echo "Final state:\n";
echo $matt->getInfo()."\n";
echo $myAcc->getInfo()."\n";
echo $friend->getInfo()."\n";

