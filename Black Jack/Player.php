<?php

class Player
{
    public array $cards;

    public function takeCard(Card $card): void
    {
        $this->cards[] = $card;
    }

    public function getNames(): array
    {
        $cardNames = [];
        foreach ($this->cards as $card) {
            $cardNames[] = $card->getName();
        }
        return $cardNames;
    }

    public function getPoints(): int
    {
        $points = 0;
        $aces = 0;
        foreach ($this->cards as $card) {
            if ($card->getPoints() === 11) {
                $aces++;
            }
            $points += $card->getPoints();
        }
        while ($aces > 0 && $points > 21) {
            $points -= 10;
            $aces--;
        }
        return $points;
    }

    public function isPlaying(): bool
    {
        return $this->getPoints() < 21;
    }

    public function hasLost(): bool
    {
        return $this->getPoints() > 21;
    }

}
