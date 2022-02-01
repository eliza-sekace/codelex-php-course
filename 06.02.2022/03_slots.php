<?php

$slotElements = [
    '@' => 1,
    '#' => 1.5,
    '*' => 1.5,
    '$' => 2];
$gameBoardRows = 4;
$gameBoardColumns = 4;
$playerStartMoney = readline('Input money: ');
$oneSpinPrice = readline('Your money: ' . $playerStartMoney . '$ Write one spin price: ');
$winCoefficient = 2;


$winnerCombos = [
    [[0, 0], [0, 1], [0, 2], [0, 3]],
    [[1, 0], [1, 1], [1, 2], [1, 3]],
    [[2, 0], [2, 1], [2, 2], [2, 3]],
    [[3, 0], [3, 1], [3, 2], [3, 3]],
    [[0, 0], [1, 1], [2, 2], [3, 3]],
    [[3, 0], [2, 1], [1, 2], [0, 3]],
];


function getWinner(array $gameBoard, array $winnerCombos, array $slotElements)
{
    $winningPoints = 0;
    foreach ($winnerCombos as $combination) {
        foreach ($combination as $item) {
            [$row, $column] = $item;
            if ($gameBoard[$row][$column] !== $gameBoard[$combination[0][0]][$combination[0][1]]) {
                break;
            }
            if (end($combination) === $item) {
                $winningPoints += 1 * $slotElements[$gameBoard[$row][$column]];
            }
        }
    }
    return $winningPoints;
}


while ($playerStartMoney >= $oneSpinPrice) {
    $gameBoard = [];
    for ($i = 0; $i < $gameBoardRows; $i++) {
        $row = [];
        $randomElement = array_rand($slotElements);
        for ($j = 0; $j < $gameBoardColumns; $j++) {
            $randomElement = array_rand($slotElements);
            $row[] = $randomElement;
        }
        $gameBoard[] = $row;
    }

    echo getFormattedBoard($gameBoard);

    $winningLines = getWinner($gameBoard, $winnerCombos, $slotElements);
    if (getWinner($gameBoard, $winnerCombos, $slotElements) > 0) {
        $moneyWon = $oneSpinPrice * $winCoefficient * $winningLines;
        $playerStartMoney += $moneyWon;
        echo "\nYou won " . $moneyWon . "! Your money: " . $playerStartMoney . "\n";
    } else {
        $playerStartMoney -= $oneSpinPrice;
        echo "\nYou lost! Your money:  " . $playerStartMoney . "\n";
    }

    if (strtoupper(readline('Spin again? Y / N')) == "N") {
        break;
    }
    if ($playerStartMoney < $oneSpinPrice) {
        echo 'Not enough money!';
    }
}


function getFormattedBoard($gameBoard)
{
    $output = '';
    foreach ($gameBoard as $row) {
        $output .= implode(" ", $row) . "\n";
    }
    return $output;
}


//Majasdarbs:
//var nodefinet kombinacijas
//iespeja ielikt naudu ✓
//speles cena, kas tiek nonemta nost ✓
//uzvaras maksa par katru konkreto liniju ar konkreto elementu - ar indeksu reizinaat?
//spelu automats ar while ciklu (likme paliek taa pati)  ✓
//pabeigt ar 3x3 laukumu ✓
//pabeigt ar 4x4 laukumu ✓
//ievadsumma, likme, koeficients, ja uzvar


