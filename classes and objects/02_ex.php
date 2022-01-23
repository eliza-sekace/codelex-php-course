<?php

class Point
{
    public int $x;
    public int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
}

function swapPoints(Point &$p1, Point &$p2)
{        //pass by reference
    $buffer = $p1;
    $p1 = $p2;
    $p2 = $buffer;
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);


swapPoints($p1, $p2);

echo "(" . $p1->x . ", " . $p1->y . ")\n";
echo "(" . $p2->x . ", " . $p2->y . ")";





