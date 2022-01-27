<?php

class Card
{
    private string $suite;
    private string $value;

    public function __construct(string $suite, string $value)
    {
        $this->suite = $suite;
        $this->value = $value;
    }

    public function getName(): string
    {
        return $this->suite . $this->value;
    }

    public function getPoints(): int
    {
        if ($this->value === "A") {
            return 11;
        }
        if (!is_numeric($this->value)) {
            return 10;
        }
        return (int)$this->value;

    }
}

