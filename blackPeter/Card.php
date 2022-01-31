<?php

class Card
{
    private string $suite;
    private string $value;

    public function __construct($suite,$value)
    {
        $this->suite = $suite;
        $this->value=$value;
    }

    public function getValue():string
    {
        return $this->value;
    }

    public function getName():string
    {
        return $this->suite.$this->value;
    }


    public function hasPairIn(array $cards):bool
    {
        foreach ($cards as $card){
            if ($this->isSameColor($card) && $this->isSameValue($card)){
                return true;
            }
        }
        return false;
    }
    private function isSameValue(Card $card):bool
    {
        return $this->value === $card->value;
    }

   private function isSameColor(Card $card):bool
    {
        if($this->suite === $card->suite){
            return false;
        }
        return in_array($this->suite, ["♥", "♦"]) === in_array($card->suite,["♥", "♦"]);
    }
}
