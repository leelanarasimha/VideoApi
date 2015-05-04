<?php
include 'vendor/autoload.php';

$youtubeapi = new \Leela\VideoApi(new \Leela\Services\DailyMotionService());
$youtubeapi->getVideoDetails('x2on26a');

