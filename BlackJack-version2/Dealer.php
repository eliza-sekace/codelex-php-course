<?php

class Dealer extends Player
{
    public function isPlaying(): bool
  {
   return $this->getPoints() < 17;
  }

  public function getHiddenNames()
  {
      $names = $this->getNames();
      $names[1] = "**";
      return $names;
  }

}