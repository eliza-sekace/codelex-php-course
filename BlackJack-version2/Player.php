<?php

class Player
{
    private array $cards;


    //paņemt kārti

    public function takeCard(Card $card)
    {
        $this->cards[] = $card;
    }

    //dabūt kāršu nosaukumus

    public function getNames()
    {
        $cardNames=[];
        foreach ($this->cards as $card){
           $cardNames[] = $card->getName();
        }
        return $cardNames;
    }

    //dabūt punktu skaitu
    public function getPoints()
    {
        $points=0;
        $aces=0;
        foreach($this->cards as $card){
            if($card->getValue() === "A"){
                $aces++;
            }
            $points += $card->getPoints();
            while ($points > 21 && $aces>0){
                    $points-=10;
                    $aces--;
                }
            }
        return $points;
    }
    //vai ir uzvarējis

    public function hasWon()
    {
        return $this->getPoints() === 21;
    }

    public function hasLost()
    {
        return $this->getPoints() > 21;
    }
    //vai ir zaudējis

    public function isPlaying()
    {
        return $this->getPoints() < 21;
    }
}