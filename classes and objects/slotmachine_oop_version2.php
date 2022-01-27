<?php

class Game
{
    private int $money;
    private int $bet;
    private Board $board;
    private int $winnings;

    public function __construct(Board $board)
    {
        $this->board = $board;
    }

    public function getMoney()
    {
        return $this->money;
    }

    public function getBoard()
    {
       return $this->board;
    }

    public function getWinnings()
    {
        return $this->winnings;
    }

    public function setMoney(int $money)
    {
        $this->money = $money;
    }

    public function setBet(int $bet)
    {
        if ($bet > 0 && $bet <= $this->money) {
            $this->money -= $bet;
            $this->bet = $bet;
        }
    }

    public function isOver(): bool
    {
        return !$this->money > 0;
    }

    public function spin()
    {
        $this->board->shuffle();
        if ($this->board->getPoints() > 0) {
            $this->winnings = 2 * $this->board->getPoints()* $this->bet;
            $this->money += $this->winnings;
        }
        else {
            $this->winnings = 0;
        }
        $this->bet = 0;
    }
}

class Board
{
    private int $rows;
    private int $columns;
    private array $gameBoard = [];
    private SlotElements $elements;
    private array $winnerCombos = [
        [[0, 0], [0, 1], [0, 2], [0, 3]],
        [[1, 0], [1, 1], [1, 2], [1, 3]],
        [[2, 0], [2, 1], [2, 2], [2, 3]],
        [[3, 0], [3, 1], [3, 2], [3, 3]],
        [[0, 0], [1, 1], [2, 2], [3, 3]],
        [[3, 0], [2, 1], [1, 2], [0, 3]],
    ];

    public function __construct(int $rows, int $columns, SlotElements $elements)
    {
        $this->rows = $rows;
        $this->columns = $columns;
        $this->elements = $elements;
    }

    public function shuffle()
    {
        $board = [];
        for ($i = 0; $i < $this->rows; $i++) {
            $row = [];
            for ($j = 0; $j < $this->columns; $j++) {
                $row[] = $this->elements->getRandom();
            }
            $board[] = $row;
        }
        $this->gameBoard = $board;
    }

    public function getFormattedBoard()
    {
        $output = '';
        foreach ($this->gameBoard as $row) {
            $rowOutput = [];
            foreach ($row as $element) {
                $rowOutput[] = $element->getName();
            }
            $output .= implode(" ", $rowOutput) . "\n";
        }
        return $output;
    }

    public function getPoints()
    {
        $winningPoints = 0;
        foreach ($this->winnerCombos as $combination) {
            foreach ($combination as $item) {
                [$row, $column] = $item;
                if ($this->gameBoard[$row][$column]->getName() !== $this->gameBoard[$combination[0][0]][$combination[0][1]]->getName()) {
                    break;
                }
                if (end($combination) === $item) {
                    $winningPoints += 1 * $this->gameBoard[$row][$column]->getCoefficient();
                }
            }
        }
        return $winningPoints;
    }

}

class SlotElements
{
    private array $elements = [];

    public function __construct(array $elements = [])
    {
        $this->elements = $elements;
    }

    public function getRandom()
    {
        return $this->elements[array_rand($this->elements)];
    }
}

class Element
{
    public string $symbol;
    private float $coefficient;

    public function __construct(string $symbol, float $coefficient)
    {
        $this->symbol = $symbol;
        $this->coefficient = $coefficient;
    }

    public function getName()
    {
        return $this->symbol;
    }

    public function getCoefficient()
    {
        return $this->coefficient;
    }
}


$slotElements = new SlotElements([
    new Element("@", 1),
    new Element("#", 1.5),
    new Element("*", 1.5),
    new Element("$", 2)
]);

$gameBoard = new Board(4, 4, $slotElements);
$game = new Game($gameBoard);
$game->setMoney((int) readline('Input money: '));
$spinPrice = readline('Your money: ' . $game->getMoney() . '$ Write one spin price: ');


while (!$game->isOver()) {
    $game->setBet((int)$spinPrice);
    $game->spin();
    echo $game->getBoard()->getFormattedBoard();
    if ($game->getWinnings() > 0) {
        echo "\nYou won " . $game->getWinnings()."! Your money: " . $game->getMoney() . "\n";
    } else {
        echo "\nYou lost! Your money:  " . $game->getMoney() . "\n";
    }
    if (strtoupper(readline('Spin again? Y / N')) == "N") {
        break;
    }
    if ($game->getMoney() < $spinPrice) {
        echo 'Not enough money!';
    }
}

