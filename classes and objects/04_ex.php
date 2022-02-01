<?php

class MovieTheater
{
    public array $movies;

    public function __construct(array $movies = [])
    {
        $this->movies = $movies;
    }

    public function getTitle()
    {
        $allTitles = [];
        foreach ($this->movies as $movie) {
            $allTitles[] = $movie->getTitle();
        }
        return $allTitles;
    }

    public function getStudio()
    {
        $allStudios = [];
        foreach ($this->movies as $movie) {
            $allStudios[] = $movie->getStudio();
        }
        return $allStudios;
    }

    public function getPG()
    {
        $pgMovies = [];
        foreach ($this->movies as $movie) {
            if ($movie->getRating() == "PG") {
                $pgMovies[] = $movie->getTitle().", Rating: ".$movie-> getRating();
                }
        }
        return $pgMovies;
    }

    public function add(Movie $movie)
    {
        $this->movies[]=$movie;
    }
}

class Movie
{
    private string $title;
    private string $studio;
    private string $rating;

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getStudio()
    {
        return $this->studio;
    }

    public function getRating()
    {
        return $this->rating;
    }

}


$listOfMovies = new MovieTheater([
    new Movie ("Casino Royale", "Eon Productions", "PG13"),
    new Movie("Glass", "Buena Vista International", "PG13"),
    new Movie("Spider-man: Into the Spider-Verse", "Columbia Pictures", "PG")
]);

$listOfMovies->add(new Movie ("Spider-man", "Eon Productions", "PG"));

echo "All movies:\n";
foreach ($listOfMovies->movies as $movie){
    echo $movie->getTitle()." ". $movie->getStudio()."\n";
}

echo "\nPG movies: \n";
echo implode("\n", $listOfMovies->getPG());

