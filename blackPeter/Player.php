<?php

class Player
{
    private array $cards;
    private array $dropped;

    public function takeCard(Card $card)
    {
        $this->cards[] = $card;
    }

    public function giveCard(): Card
    {
        shuffle($this->cards);
        return array_pop($this->cards);
    }

    public function hasCards()
    {
        return count($this->cards)>1;
    }

    public function getNames()
    {
        $cardNames = [];
        foreach ($this->cards as $card) {
            $cardNames[] = $card->getName();
        }
        return $cardNames;
    }

    public function getHand()
    {
        return $this->cards;
    }


    public function drop(): void
    {
        $cards = [];
        $dropped=[];
        foreach ($this->cards as $card) {
            if (!$card->hasPairIn($this->cards)) {
                $cards[] = $card;
            }
            else $dropped[] = $card;
        }
        $this->dropped = $dropped;
        $this->cards = $cards;
    }



}

