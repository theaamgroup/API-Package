<?php

use AAM\Api\Endpoint\Auth;
use AAM\Api\Endpoint\Ymm\Make;

require_once __DIR__ . '/../../src/Request.php';
require_once __DIR__ . '/../../src/Endpoint/Auth.php';
require_once __DIR__ . '/../../src/Endpoint/Ymm/Make.php';

// Fetch list of makes
$auth = new Auth('{API_KEY}');
$make = new Make($auth);
$make->setYear(2020);
print_r($make->getMakes());
