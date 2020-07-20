<?php

use AAM\Api\Endpoint\Auth;
use AAM\Api\Endpoint\Youtube\Video;

require_once __DIR__ . '../../../src/Request.php';
require_once __DIR__ . '../../../src/endpoint/Auth.php';
require_once __DIR__ . '../../../src/endpoint/Youtube/Video.php';

$auth = new Auth('{API_KEY}');

// Fetch details for one or multiple (comma-separated) videos
$video = new Video($auth);
$video->setProjectKey('aam');
$video->addVideoId('g5f6B4IIqZI');
$video->addVideoId('fTvcXlxFIzY');
print_r($video->getVideo());

// Extract video ID from YouTube URL
$video_id = Video::extractVideoId('https://www.youtube.com/watch?v=ee58jkn7nAc');
echo $video_id;
