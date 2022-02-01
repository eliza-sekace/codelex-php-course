<?php
require_once "Tire.php";
require_once "Odometer.php";
require_once "FuelGauge.php";
require_once "LowBeam.php";
require_once "HighBeam.php";
require_once "Accumulator.php";


class Car
{
    private string $name;
    private FuelGauge $fuelGauge;
    private Odometer $odometer;

    private array $tires = [];
    private array $lowBeamLights = [];
    private array $highBeamLights = [];
    private bool $started = false;
    private Accumulator $accumulator;

    private const CONSUMPTION_PER_KM = 0.07; // 7L on 100km
    private const TIRE_QUALITY_LOSS_PER_KM = [1, 2];
    private const LOW_BEAM_QUALITY_LOSS_PER_KM = [2, 3];
    private const HIGH_BEAM_QUALITY_LOSS_PER_KM = [1, 2];

    public function __construct(string $name, int $fuelGaugeAmount, $tires = [])
    {
        $this->name = $name;
        $this->fuelGauge = new FuelGauge($fuelGaugeAmount);
        $this->odometer = new Odometer();
        $this->tires = [
            new Tire("front left"),
            new Tire("front right"),
            new Tire("rear left"),
            new Tire("rear right")
        ];

        $this->lowBeamLights = [
            new LowBeam("left"),
            new LowBeam("right"),
        ];

        $this->highBeamLights = [
            new HighBeam("left"),
            new HighBeam("right"),
        ];
    }

    public function hasStarted($pin): bool
    {
        if ($pin == 1234) {
            return true;
        }
        return false;
    }

    public function drive(int $distance = 10): void
    {

        if ($this->fuelGauge->getFuel() <= 0) return;

        $this->fuelGauge->change($distance * -self::CONSUMPTION_PER_KM);
        $this->odometer->addMileage($distance);
        //$this->accumulator->changeCondition(5);

        [$minQualityLoss, $maxQualityLoss] = self::TIRE_QUALITY_LOSS_PER_KM;
        foreach ($this->tires as $tire) {
            $tire->changeCondition(rand($minQualityLoss * $distance, $maxQualityLoss * $distance));
        }
        [$minQualityLoss, $maxQualityLoss] = self::LOW_BEAM_QUALITY_LOSS_PER_KM;
        foreach ($this->lowBeamLights as $lowBeamLight) {
            $lowBeamLight->changeCondition(rand($minQualityLoss * $distance, $maxQualityLoss * $distance));
        }
        [$minQualityLoss, $maxQualityLoss] = self::HIGH_BEAM_QUALITY_LOSS_PER_KM;
        foreach ($this->highBeamLights as $highBeamLight) {
            $highBeamLight->changeCondition(rand($minQualityLoss * $distance, $maxQualityLoss * $distance));
        }
    }

    public function hasValidTires(): bool
    {
        $brokenTires = [];
        foreach ($this->tires as $tire) {
            if ($tire->getCondition() <= 0) {
                $brokenTires[] = $tire;
            }
        }
        if (count($brokenTires) < 2) {
            return false;
        } else return true;
    }

    public function getTires()
    {
        return $this->tires;
    }

    public function getLowBeam()
    {
        return $this->lowBeamLights;
    }

    public function getHighBeam()
    {
        return $this->highBeamLights;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFuel(): float
    {
        return $this->fuelGauge->getFuel();
    }

    public function getMileage(): int
    {
        return $this->odometer->getMileage();
    }

    public function getAccumulator()
    {
        return $this->accumulator;
    }


    public function hasValidLowBeam(): bool
    {
        foreach ($this->lowBeamLights as $lowBeamLight) {
            if ($lowBeamLight->getCondition() <= 0) {
                return false;
            }
        }
        return true;
    }

    public function hasValidHighBeam(): bool
    {
        foreach ($this->highBeamLights as $highBeamLight) {
            if ($highBeamLight->getCondition() <= 0) {
                return false;
            }
        }
        return true;
    }

}


$name = readline('Car name: ');
$fuelGaugeAmount = (int)readline('Fuel Gauge amount: ');
$driveDistance = (int)readline('Drive distance: ');


$car = new Car($name, $fuelGaugeAmount);

echo "------ " . $car->getName() . " ------";
echo PHP_EOL;
if (!$car->hasStarted(0000)) {
    echo "Car's not started\n";
}
$pin =(int) readline("To start a car, input pin");
echo "\n";
if ($fuelGaugeAmount >= 2 && $car->hasStarted($pin)) {
    echo "Car started!\n";
    while ($car->getFuel() > 0 && $car->hasValidHighBeam() && $car->hasValidLowBeam() || $car->hasValidTires()) {
        echo "Fuel: " . $car->getFuel() . "l" . PHP_EOL;
        echo "Mileage: " . $car->getMileage() . "km" . PHP_EOL;
       // echo "Accumulator % ".$car->getAccumulator() .PHP_EOL;

        foreach ($car->getTires() as $tire) {
            echo "Tire " . $tire->getName() . ": " . $tire->getCondition() . "%" . "\n";
        }

        foreach ($car->getLowBeam() as $lowBeamLight) {
            echo "Low beam light " . $lowBeamLight->getName() . ": " . $lowBeamLight->getCondition() . "%" . "\n";
        }

        foreach ($car->getHighBeam() as $highBeamLight) {
            echo "High beam light " . $highBeamLight->getName() . ": " . $highBeamLight->getCondition() . "%" . "\n";
        }

        $car->drive($driveDistance);

        sleep(1);
    }
}

//riepu nodilums = katrai random
//kad nodilusas - vairs braukt nevar
//ir gan tuvas gaismas, gan taalaas
//tuvaas gaismas nodilst atrak kaa taalaas
//ja gaisma ir zem 50%, braukt vairs nedrikst.

//auto ir jaiedarbina sakumaa
//lai iedarbinaatu, jabut baakaa degv


//akumulators - ja ir zem 5%, nevar iedarbinaat
//braucot - akumulators laadeejas
