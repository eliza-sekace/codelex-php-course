<?php

require_once "VideoStore.php";
require_once "Video.php";
require_once "Application.php";

$app = new Application(new VideoStore([
    new Video("SpiderMan"),
    new Video("The Matrix"),
    new Video("Godfather")
]));
$app->run();


