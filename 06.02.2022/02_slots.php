<?php

$slotElements = [
    '@' => 1,
    '#' => 1.5,
    '*' => 1.5,
    '$' => 2];
$gameBoardRows = 4;
$gameBoardColumns = 3;
$playerStartMoney = readline('Input money: ');
$oneSpinPrice = readline('Your money: ' . $playerStartMoney . '$ Write one spin price: ');
$winCoefficient = 2;

//get winnerCombos data:
$winnerComboData = '';
if ($gameBoardRows == 3 && $gameBoardColumns == 3) {
    $winnerComboData = file_get_contents("3x3winningcombos.txt");
} else if ($gameBoardRows == 4 && $gameBoardColumns == 4) {
    $winnerComboData = file_get_contents("4x4winningcombos.txt");
} else {
    echo "Sorry! Only 3x3 or 4x4 slots are available!";
    exit;
}
$winnerCombosData = explode("|", $winnerComboData);
$winnerCombos = [];

foreach ($winnerCombosData as $combo) {
    $winnerCombinations = [];
    $combination = explode(";", $combo);
    foreach ($combination as $cell) {
        $oneCombo = [];
        $combination = explode(",", $cell);
        $integerIDs = array_map(function ($value) {
            return (int)$value;
        }, $combination);
        $oneCombo[] = $integerIDs;
        $winnerCombinations[] = $oneCombo;
    }
    $winnerCombos[] = array_merge(...$winnerCombinations);
}


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


function getFormattedBoard($gameBoard)
{
    $output = '';
    foreach ($gameBoard as $row) {
        $output .= implode(" ", $row) . "\n";
    }
    return $output;
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



//Majasdarbs:
//var nodefinet kombinacijas
//iespeja ielikt naudu ✓
//speles cena, kas tiek nonemta nost ✓
//uzvaras maksa par katru konkreto liniju ar konkreto elementu - ar indeksu reizinaat?
//spelu automats ar while ciklu (likme paliek taa pati)  ✓
//pabeigt ar 3x3 laukumu ✓
//pabeigt ar 4x4 laukumu ✓
//ievadsumma, likme, koeficients, ja uzvar


