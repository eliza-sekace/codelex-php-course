<?php

class VideoStore
{
    public array $videos;

    public function __construct(array $videos = [])
    {
        $this->videos = $videos;
    }

    public function add(Video $video)
    {
        $this->videos[] = $video;
    }

    public function rent(string $title): void
    {
        foreach ($this->videos as $video) {
            if ($video->getTitle() === $title && $video->isAvailable()) {
                $video->rent();
                break;
            }
        }
    }

    public function return(string $title)
    {
        foreach ($this->videos as $video) {
            if ($video->getTitle() === $title && !$video->isAvailable()) {
                $video->return();
                break;
            }
        }
    }

    public function rate(int $rating, string $title)
    {
        foreach ($this->videos as $video) {
            if ($video->getTitle() === $title) {
                $video->addRating($rating);
            }
        }
    }

    public function listInventory()
    {
        $list = '';
        foreach ($this->videos as $video) {
            $list .= $video->getInfo() . "\n";
        }
        return $list;
    }


}