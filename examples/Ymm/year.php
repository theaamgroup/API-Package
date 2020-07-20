<?php

use AAM\Api\Endpoint\Auth;
use AAM\Api\Endpoint\Ymm\Year;

require_once __DIR__ . '../../../src/Request.php';
require_once __DIR__ . '../../../src/endpoint/Auth.php';
require_once __DIR__ . '../../../src/endpoint/Ymm/Year.php';

// Fetch list of years
$auth = new Auth('{API_KEY}');
$year = new Year($auth);
print_r($year->getYears());
