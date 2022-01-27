<?php

class Deck
{
    private array $cards = [];
    private array $suits = ["♥", "♦", "♣", "♠"];
    private array $values = ["2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A"];

    public function __construct()
    {
        foreach ($this->suits as $suite) {
            foreach ($this->values as $value) {
                $this->cards[] = new Card($suite, $value);
            }
        }
    }
    //samaisiit
    public function shuffle(): void
    {
        shuffle($this->cards);
    }

    //iedot 1 kārti
    public function getCard()
    {
        return array_pop($this->cards);
    }


}
