<?php

class Accumulator
{
    private string $name;
    private int $condition = 50;

    public function __construct(string $name, int $condition = 100)
    {
        $this->name = $name;
        $this->condition = $condition;
    }

    public function changeCondition(int $percent): void
    {
        $this->condition += $percent;
    }

    public function getCondition()
    {
        return $this->condition;
    }

    public function getName()
    {
        return $this->name;
    }
}
