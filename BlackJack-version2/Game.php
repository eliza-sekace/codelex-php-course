<?php

class Game
{
    private int $bet;
    private int $money;

    public function __construct(int $money, $bet)
    {
        $this->money = $money;
        $this->bet = $bet;
    }

    public function getBet()
    {
        return $this->bet;
    }

    public function getMoney()
    {
        return $this->money;
    }

    public function lose()
    {
        $this->money-=$this->bet;
    }

    public function add()
    {
        $this->money+=$this->bet * 2;
    }
}