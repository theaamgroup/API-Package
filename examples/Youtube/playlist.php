<?php

use AAM\Api\Endpoint\Auth;
use AAM\Api\Endpoint\Youtube\Playlist;

require_once __DIR__ . '/../../src/Request.php';
require_once __DIR__ . '/../../src/Endpoint/Auth.php';
require_once __DIR__ . '/../../src/Endpoint/Youtube/Playlist.php';

$auth = new Auth('{API_KEY}');

// Fetch playlist ID
$playlist = new Playlist($auth);
$playlist->setProjectKey('aam');
$playlist->setChannelDescriptor('accperformance');
print_r($playlist->getPlaylist());

// Fetch playlist items
$playlist = new Playlist($auth);
$playlist->setProjectKey('aam');
$playlist->setChannelDescriptor('accperformance');
$playlist->setLimit(3);
print_r($playlist->getPlaylistItems());
