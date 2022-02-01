<?php

require_once "Card.php";
require_once "Deck.php";
require_once "Player.php";
require_once "Dealer.php";
require_once "Game.php";


$playerMoney = readline("Add money: ");
PHP_EOL;
$bet = readline("One game bet: ");
PHP_EOL;
$money = new Game($playerMoney, $bet);

while ($money->getMoney() > 0) {

    $player = new Player();
    $dealer = new Dealer();
    $deck = new Deck();

    $deck->shuffle();
    $player->takeCard($deck->getCard());
    $dealer->takeCard($deck->getCard());
    $player->takeCard($deck->getCard());
    $dealer->takeCard($deck->getCard());

    echo "Your money: " . $money->getMoney() . "\n";
    echo "Bet: " . $money->getBet() . "\n";

    echo "Dealer cards: " . implode(" ", $dealer->getHiddenNames()) . "\n";
    echo "Player cards: " . implode(" ", $player->getNames()) . "\n";

    while ($player->isPlaying()) {
        $choice = readline("H for hit, S for stand");
        if (strtoupper($choice) == "S") {
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
        $money->lose();
        echo "You lost. Over 21!\nYour money: " . $money->getMoney() . "\n";
    } else if ($dealer->hasLost() && $player->getPoints() < 21) {
        $money->add();
        echo "Player wins!\nYour money: " . $money->getMoney();
    } else if ($dealer->hasLost() && $player->getPoints() === 21) {
        $money->add();
        echo "BLACKJACK!\nYour money: " . $money->getMoney();
    } else if ($player->getPoints() === $dealer->getPoints()) {
        echo "Push!\nYour money: " . $money->getMoney();
    } else if ($player->getPoints() > $dealer->getPoints()) {
        $money->add();
        echo "You won!\nYour money: " . $money->getMoney();
    } else {
        $money->lose();
        echo "Dealer wins!\nYour money: " . $money->getMoney();
    }

    if ($money->getMoney() < $money->getBet()) {
        echo "Not enough money!";
    }

    echo "\n";
    if (readline("Play again? Y/N") === "n") {
        break;
    }

}