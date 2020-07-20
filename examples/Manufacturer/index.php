<?php

use AAM\Api\Endpoint\Auth;
use AAM\Api\Endpoint\Manufacturer;

require_once __DIR__ . '../../../src/Request.php';
require_once __DIR__ . '../../../src/endpoint/Auth.php';
require_once __DIR__ . '../../../src/endpoint/Manufacturer.php';

$auth = new Auth('{API_KEY}');
$manufacturer = new Manufacturer($auth);
$manufacturer->setAAIA('BBWQ');
print_r($manufacturer->getManufacturer());
