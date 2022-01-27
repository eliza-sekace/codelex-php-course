<?php

class Board
{
    private int $rows = 4;
    private int $columns = 4;
    private array $gameBoard = [];
    private SlotElements $elements;
    private array $winnerCombos=[
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
        $this->makeGameBoard($elements);
        $this->elements = $elements;
    }

    public function makeGameBoard(SlotElements $all):array
    {
        $board=[];
        for ($i = 0; $i < $this->rows; $i++) {
            $row = [];
            $randomElement = $all->getAll()[array_rand($all->getAll())]; //!
            for ($j = 0; $j < $this->columns; $j++) {
                $this->randomElement = $all->getAll()[array_rand($all->getAll())];
                $row[] = $this->randomElement;
            }
            $board[] = $row;
        }
      $this->gameBoard=$board;
        return $this->gameBoard;
    }

    public function getFormattedBoard()
    {
        $output = '';
        foreach ($this->gameBoard as $row) {
            $rowOutput=[];
            foreach ($row as $element){
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
    private array $all = [];

    public function __construct(array $all = [])
    {
        $this->all = $all;
    }

    public function add(Element $element)
    {
        $this->all[] = $element;
    }

    public function getAll()
    {
        return $this->all;
    }

    public function getNames(){
        $names=[];
        foreach ($this->all as $element){
            $names[]= $element->randomElement;
        }
        return $names;
    }

}

class Element extends SlotElements
{
    public string $randomElement;
    private float $coefficient;

    public function __construct(string $randomElement,float $coefficient, array $all = [])
    {
        $this->randomElement = $randomElement;
        $this->coefficient = $coefficient;
    }

    public function getName()
    {
        return $this->randomElement;
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

$playerStartMoney = readline('Input money: ');
$oneSpinPrice = readline('Your money: ' . $playerStartMoney . '$ Write one spin price: ');


while ($playerStartMoney >= $oneSpinPrice) {
    $gameBoard=new Board(4,4, $slotElements);
    echo $gameBoard->getFormattedBoard();

    if ($gameBoard->getPoints() > 0) {
        $moneyWon = $oneSpinPrice * 2 * $gameBoard->getPoints();
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