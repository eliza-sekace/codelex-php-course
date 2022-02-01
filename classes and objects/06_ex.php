<?php

class Survey
{
    private int $surveyed = 12467;
    private float $purchasedDrinks = 0.14;
    private float $preferCitrus = 0.64;

    public function __construct(int $surveyed = 12467, float $purchasedDrinks = 0.14, float $preferCitrus = 0.64 )
    {
        $this->surveyed = $surveyed;
        $this->purchasedDrinks = $purchasedDrinks;
        $this->preferCitrus = $preferCitrus;
    }

    public function getSurveyed()
    {
        return $this->surveyed;
    }


    public function getEnergyDrinkers()
    {
        return round($this->purchasedDrinks * $this->surveyed);
    }

    public function getPreferCitrus()
    {
        return round($this->preferCitrus * $this->getEnergyDrinkers());
    }
}

$survey = new Survey();
echo "Total number of people surveyed " . $survey->getSurveyed() . "\n";
echo "Approximately " . $survey->getEnergyDrinkers() . " bought at least one energy drink\n";
echo "of those " . $survey->getPreferCitrus(). " prefer citrus flavored energy drinks.";


