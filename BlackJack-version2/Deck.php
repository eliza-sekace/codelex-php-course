<?php

class Deck
{
    private array $cards;
    private array $suits = ["♥", "♦", "♣", "♠"];
    private array $values = ["2","3","4","5","6","7","8","9","10","J","Q","K","A"];

    public function __construct()
    {
        //make deck
        foreach ($this->suits as $suite){
            foreach ($this->values as $value){
                $this->cards[] =new Card($suite,$value);
            }
        }
    }

    //shuffle
    public function shuffle()
    {
        return shuffle($this->cards);
    }

    //get one card

    public function getCard()
    {
        return array_shift($this->cards);
    }
}