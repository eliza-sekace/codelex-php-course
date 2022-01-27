<?php
require_once "Card.php";
require_once "Deck.php";
require_once "Player.php";
require_once "Dealer.php";

while (true) {
    $player = new Player;
    $dealer = new Dealer;
    $deck = new Deck;

    $deck->shuffle();
    $player->takeCard($deck->getCard());
    $dealer->takeCard($deck->getCard());
    $player->takeCard($deck->getCard());
    $dealer->takeCard($deck->getCard());

    echo "Dealer cards: " . implode(" ", $dealer->getHiddenNames()) . "\n";
    echo "Player cards: " . implode(" ", $player->getNames()) . "\n";

    while ($player->isPlaying()) {
        $choice = readline("H for hit, S for stand");
        if (strtoupper($choice) === "S") {
            break;
        }
        $player->takeCard($deck->getCard());
        echo "Dealer cards: " . implode(" ", $dealer->getHiddenNames()) . "\n";
        echo "Player cards: " . implode(" ", $player->getNames()) . "\n";
    }
    while ($dealer->isPlaying() && !$player->hasLost()) {
        $dealer->takeCard($deck->getCard());

    }
    echo "Dealer cards: " . implode(" ", $dealer->getNames()) . "\n";
    echo "Player cards: " . implode(" ", $player->getNames()) . "\n";
    echo "-----------------------\n";

    if ($player->hasLost()) {
        echo "Over 21 :( Dealer wins!\n";}
    else if ($dealer->hasLost() && $player->getPoints() < 21) {
            echo "Player wins!\n";
        } else if ($player->getPoints() === $dealer->getPoints()) {
            echo "Blackjack push! \n";
        } else if ($player->getPoints() > $dealer->getPoints()) {
            echo "Player wins! Player points:" . $player->getPoints() . "\n";
        } else {
            echo "Dealer wins!\n";
        }

        if (readline("Play again? Y / N \n") == "n") {
            break;
        };
    }



