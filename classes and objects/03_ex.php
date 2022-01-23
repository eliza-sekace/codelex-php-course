<?php

class FuelGauge
{
    public int $amount;
    public int $capacity;

    public function __construct(int $amount, int $capacity = 70)
    {
        $this->amount = $amount;
        $this->capacity = $capacity;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function increment($addedFuel): void
    {
        if ($this->amount <= $this->capacity) {
            $this->amount += $addedFuel;
        }
    }

    public function decrement(): void
    {
        if ($this->amount > 0) {
            $this->amount--;
        }
    }
}


class Odometer
{
    public int $mileage;

    public function __construct($mileage)
    {
        $this->mileage = $mileage;
    }

    public function getMileage()
    {
        return $this->mileage;
    }

    public function increment($kilometers = 1)
    {
        $this->mileage = ($this->mileage += $kilometers) % 1000000;
    }
}

$fuelGauge = new FuelGauge(20);
$odometer = new Odometer(999991);
$distance = 200;

echo "current mileage: " . $odometer->getMileage() . "km; Fuel left: " . $fuelGauge->getAmount() . " liters \n";

$fuelGauge->increment(20);

echo "You added fuel!!\n";

while ($fuelGauge->getAmount() > 0 && $distance > 0) {
    $distance -= 10;
    $odometer->increment(10);
    $fuelGauge->decrement();
    echo "current mileage: " . $odometer->getMileage() . "km; Fuel left: " . $fuelGauge->getAmount() . " liters \n";
}
