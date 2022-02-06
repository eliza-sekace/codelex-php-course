<?php

class Video
{
    private string $title;
    private bool $isAvailable = true;
    private array $ratings = [];

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function isAvailable(): bool
    {
        return $this->isAvailable;
    }

    public function getRating(): float
    {
        if (count($this->ratings) == 0) {
            return 0.0;
        }
        return round(array_sum($this->ratings) / count($this->ratings), 1);
    }

    public function rent(): void
    {
        $this->isAvailable = false;
    }

    public function return(): void
    {
        $this->isAvailable = true;
    }


    public function addRating(int $rating): void
    {
        if ($rating >= 0 && $rating <= 10) {
            $this->ratings[] = $rating;
        }
    }

    public function getInfo(): string
    {
        return $this->getTitle() . " | Rating: " . $this->getRating() . " | " .
            ($this->isAvailable() ? "Available" : "Rented");
    }
}