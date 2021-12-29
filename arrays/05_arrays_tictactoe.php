<?php

$gameBoard = [
    ["-", "-", "-"],
    ["-", "-", "-"],
    ["-", "-", "-"]
];

function display_board($gameBoard)
{
    echo "   |   |   \n";
    echo "---+---+---\n";
    echo "   |   |   \n";
    echo "---+---+---\n";
    echo "   |   |   \n";
}

display_board($gameBoard);

$turn = "X";
$moveCount = 0;

//$winnerCombos = [
//    [[0][0], [0][1], [0][2]],
//    [[1][0], [1][1], [1][2]],
//    [[2][0], [2][1], [2][2]],
//    [[0][0], [1][1], [2][2]],
//    [[2][0], [1][1], [0][2]],
//    [[0][0], [1][0], [2][0]],
//    [[0][1], [1][1], [2][1]],
//    [[0][2], [1][2], [2][2]],
//];


while ($moveCount < 9) {
    for ($x = 0; $x < 3; $x++) {
        $row = readline("It's " . $turn . " turn. Choose a row: \n");
        $column = readline(" Choose a column: \n");
        $gameBoard[$row][$column] = $turn;
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                echo " " . $gameBoard[$i][$j] . " ";
            }
            echo "\n";
        }
        if ($turn === "X") {
            $turn = "O";
        } else {
            $turn = "X";
        }
        $moveCount++;
    }
    echo "Its " . $turn . " turn";
}


//win
//tie
//lose
//ka nevar uzlikt uz jau aiznemta laucina



