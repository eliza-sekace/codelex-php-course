<?php

class Date
{
    private int $day;
    private int $month;
    private int $year;
    private array $daysInMonth = [
        1 => 31,
        2 => 29,
        3 => 31,
        4 => 30,
        5 => 31,
        6 => 30,
        7 => 31,
        8 => 31,
        9 => 30,
        10 => 31,
        11 => 30,
        12 => 31
    ];

    public function __construct(int $day, int $month, int $year)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
        $this->isLeapYear()?$this->daysInMonth[2]=29:$this->daysInMonth[2]=28;
    }

    public function getDay()
    {
        return $this->day;
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setDay($day)
    {
        $max = $this->daysInMonth[$this->month];
        if ($day <= $max && $day > 0) {
            $this->day = $day;
        }
    }

    public function isLeapYear(): bool
    {

        return $this->year % 4 === 0;
    }

    public function setMonth($month)
    {
        if ($month > 0 && $month <= 12) {
            $this->month = $month;
        }
    }

    public function setYear($year)
    {
        if ($year > 0) {
            $this->year = $year;
            $this->isLeapYear()?$this->daysInMonth[2]=29:$this->daysInMonth[2]=28;
        }
    }

    public function getDate(): string
    {
        return $this->getDay() . "/" . $this->getMonth() . "/" . $this->getYear();
    }
}

$first = new Date(25, 4, 1961);
$first->setDay(30);
echo $first->getDate();


