<?php


class Deck
{
    private array $cards;
    private array $suits = ["♥", "♦", "♣", "♠"];
    private array $values = ["2","3","4","5","6","7","8","9","10","Q","K","A"];

    public function __construct()
    {
        foreach ($this->suits as $suite){
            foreach ($this->values as $value){
                $this->cards[] =new Card($suite,$value);
            }
        }
        $this->cards[]=new Card("♠", "J");
    }

    public function shuffle()
    {
        return shuffle($this->cards);
    }

    public function getCard()
    {
        return array_shift($this->cards);
    }

    public function hasCards()
    {
        return count($this->cards)>0;
    }

    public function getName()
    {
        foreach ($this->cards as $card){
            return $card->getName();
        }
    }
}