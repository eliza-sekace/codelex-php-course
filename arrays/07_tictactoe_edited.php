<?php


$getData = file_get_contents("08_tictactoe_files.txt");
$rows = explode("\n", $getData);

//get game board data:
$gameBoardData = explode("x", $rows[0]);
$gameBoardColumns = (int)$gameBoardData[1];
$gameBoardRow = explode("= ", $gameBoardData[0]);
$gameBoardRows = (int)$gameBoardRow[1];

$gameBoard = [];
for ($i = 0; $i < $gameBoardRows; $i++) {
    $row = [];
    for ($j = 0; $j < $gameBoardColumns; $j++) {
        $row[] = "-";
    }
    $gameBoard[] = $row;
}

////get winner combo data:
$winnerComboAllFileData = $rows[1];
$winnerCombosAll = explode("= ", $winnerComboAllFileData)[1];
$winnerCombosTogether = explode("|", $winnerCombosAll);
$winnerCombos = [];
foreach ($winnerCombosTogether as $combo) {
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

$player1 = readline("Player 1 symbol: ");
$player2 = readline("Player 2 symbol: ");

$activePlayer = $player1;
echo getFormattedBoard($gameBoard);

while (!isFull($gameBoard) && !getWinner($gameBoard, $winnerCombos, $activePlayer)) {
    $row = readline("It's " . $activePlayer . " turn. Choose a row: \n");
    $column = readline(" Choose a column: \n");
    if ($gameBoard[$row][$column] !== "-") {
        echo "Choose other cell!";
        continue;
    }
    $gameBoard[$row][$column] = $activePlayer;

    echo getFormattedBoard($gameBoard);

    if (getWinner($gameBoard, $winnerCombos, $activePlayer)) {
        echo "Winner is " . $activePlayer . "!\n";
        exit;
    } else if (isFull($gameBoard)) {
        echo "It's a tie! \n";
        exit;
    }
    $activePlayer = $player1 === $activePlayer ? $player2 : $player1;
}


function getWinner(array $gameBoard, array $winnerCombos, string $activePlayer): bool
{
    foreach ($winnerCombos as $combination) {
        foreach ($combination as $item) {
            [$row, $column] = $item;
            if ($gameBoard[$row][$column] !== $activePlayer) {
                break;
            }
            if (end($combination) === $item) {
                return true;
            }
        }
    }
    return false;
}

function isFull(array $gameBoard): bool
{
    foreach ($gameBoard as $row) {
        if (in_array("-", $row)) return false;
    }
    return true;
}

function getFormattedBoard($gameBoard)
{
    $output = '';
    foreach ($gameBoard as $row) {
        $output .= implode(" ", $row) . "\n";
    }
    return $output;
}

//atrast, kaapec vajag vel vienu gajienu
//pielikt, ja nepareizi ievadiits gajiens

//udevums:
//kombinaciju masivam un speles laukumam jaatrodas texta failaa
