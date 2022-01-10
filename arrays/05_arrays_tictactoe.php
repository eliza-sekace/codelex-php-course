<?php

$gameBoard = [
    ["-", "-", "-"],
    ["-", "-", "-"],
    ["-", "-", "-"]
];


$turn = "X";

$winnerCombos = [
    //rindas
    [[0, 0], [0, 1], [0, 2]],
    [[1, 0], [1, 1], [1, 2]],
    [[2, 0], [2, 1], [2, 2]],
    //diagonales
    [[0, 0], [1, 1], [2, 2]],
    [[2, 0], [1, 1], [0, 2]],
    //kolonnas
    [[0, 0], [1, 0], [2, 0]],
    [[0, 1], [1, 1], [2, 1]],
    [[0, 2], [1, 2], [2, 2]],
];

echo getFormattedBoard($gameBoard);
while (!isFull($gameBoard) && getWinner($gameBoard, $winnerCombos) === "-") {
    $row = readline("It's " . $turn . " turn. Choose a row: \n");
    $column = readline(" Choose a column: \n");
    if ($gameBoard[$row][$column] === "-") {
        $gameBoard[$row][$column] = $turn;
        if ($turn === "X") {
            $turn = "O";
        } else {
            $turn = "X";
        }
    }
    echo getFormattedBoard($gameBoard);
}

if (getWinner($gameBoard, $winnerCombos) !== "-") {
    echo "Winner is " . getWinner($gameBoard, $winnerCombos) . "!\n";
} else {
    echo "It's a tie!";
}


function getWinner($gameBoard, $winnerCombos)
{
    foreach ($winnerCombos as $combination) {
        if ($gameBoard[$combination[0][0]][$combination[0][1]] === $gameBoard[$combination[1][0]][$combination[1][1]] &&
            $gameBoard[$combination[1][0]][$combination[1][1]] === $gameBoard[$combination[2][0]][$combination[2][1]] &&
            $gameBoard[$combination[1][0]][$combination[1][1]] !== "-") {
            return $gameBoard[$combination[0][0]][$combination[0][1]];
        }
    }
    return "-";
}

function isFull($gameBoard)
{
    $isFull = true;
    foreach ($gameBoard as $row) {
        foreach ($row as $cell) {
            if ($cell === "-") {
                $isFull = false;
            }
        }
    }
    return $isFull;
}

function getFormattedBoard($gameBoard)
{
    $output = '';
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            $output .= " " . $gameBoard[$i][$j] . " ";
        }
        $output .= "\n";
    }
    return $output;
}

