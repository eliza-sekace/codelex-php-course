<?php

class SavingsAccount
{
    private float $balance;
    private float $deposit = 0;
    private float $withdraw = 0;
    private float $interest = 0;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function withdraw(int $amount): void
    {
        $this->balance -= $amount;
        $this->withdraw += $amount;
    }

    public function deposit($amount): void
    {
        $this->balance += $amount;
        $this->deposit += $amount;
    }

    public function calculateInterest($annualInterestRate): void
    {
        $this->interest += $annualInterestRate / 12 * $this->balance;
        $this->balance += $annualInterestRate / 12 * $this->balance;
    }

    public function getDeposit()
    {
        return $this->deposit;
    }

    public function getWithdraw()
    {
        return $this->withdraw;
    }

    public function getInterest()
    {
        return $this->interest;
    }

}

$balance = new SavingsAccount((int)readline("Enter starting balance:  "));
$annualInterestRate = (int)readline("Enter the annual interest rate:  ");
$months = (int)readline("How long has the account been opened? ");


for ($i = 1; $i <= $months; $i++) {
    $balance->deposit((int)readline("Enter money deposited for month " . $i . ": "));
    $balance->withdraw((int)readline("Enter money withdrawn for month " . $i . ": "));
    $balance->calculateInterest($annualInterestRate);
}


echo "Total deposited: $" .
    number_format($balance->getDeposit(),2, ".", ",") . "\n";
echo "Total withdrawn: $" .
    number_format($balance->getWithdraw(),2, ".", ",") . "\n";
echo "Interest earned: $" .
    number_format($balance->getInterest(),2, ".", ",") . "\n";
echo "Ending balance: $" .
    number_format($balance->getBalance(),2, ".", ",") . "\n";



