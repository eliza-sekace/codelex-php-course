<?php

require_once "Player.php";
require_once "Card.php";
require_once "Deck.php";

$deck = new Deck();
$deck->shuffle();

$players = [
    new Player(),
    new Player(),
    new Player(),
];

shuffle($players);

while ($deck->hasCards()) {
    foreach ($players as $player) {
        $player->takeCard($deck->getCard());
        if (!$deck->hasCards()) {
            break;
        }
    }
}

foreach ($players as $index => $player) {
    echo "Player " . ($index + 1) . ": " . implode(" ", $player->getNames()) . "\n";
};

echo "-----------------------------------------------------------------------\n";

foreach ($players as $index => $player) {
    $player->drop();
    echo "Player " . ($index + 1) . ": " . implode(" ", $player->getNames()) . "\n";
};
$isPlaying = true;

while ($isPlaying) {
    $actualPlayers = $players;

    for ($i = 1; $i <= count($actualPlayers); $i++) {
        if ($i == count($actualPlayers)) {
            $currentPlayer = $actualPlayers[0];
            $playerToLeft = $actualPlayers[count($actualPlayers) - 1];
        } else {
            $currentPlayer = $actualPlayers[$i];
            $playerToLeft = $actualPlayers[$i - 1];
        }

        $playerToLeftCard = $playerToLeft->giveCard();
        $currentPlayer->takeCard($playerToLeftCard);
        $currentPlayer->drop();


        $isPlaying = false;
        foreach ($actualPlayers as $player) {
            if ($player->hasCards()) {
                $isPlaying = true;
            }
        }
        if ($isPlaying === false) {
            break;
        }
        echo "Player " . ($i == count($actualPlayers) ? 1 : $i + 1) . " took " . $playerToLeftCard->getName() . "\n";
    }

    //sleep(1);
    echo "-----------------------------------------------------------------------\n";
    foreach ($players as $index => $player) {
        echo "Player " . ($index + 1) . ": " . implode(" ", $player->getNames()) . "\n";
    }
}

