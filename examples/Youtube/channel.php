<?php

use AAM\Api\Endpoint\Youtube\Channel;

require_once __DIR__ . '/../../src/Request.php';
require_once __DIR__ . '/../../src/Endpoint/Youtube/Channel.php';

// Get channel URL
echo Channel::getChannelLink('accperformance');
