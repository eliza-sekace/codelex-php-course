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

    public function getValue()
    {
        return $this->value;
    }

    public function getName()
    {
        return $this->suite.$this->value;
    }

    public function getPoints()
    {
        if ($this->value === "A"){
            return 11;
        }
        if(!is_numeric($this->value)){
            return 10;
        }
        else return (int) $this->value;
    }
}