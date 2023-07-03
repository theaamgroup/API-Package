<?php

use AAM\Api\Endpoint\Auth;
use AAM\Api\Endpoint\Product\Data;

require_once __DIR__ . '/../../src/Request.php';
require_once __DIR__ . '/../../src/Endpoint/Auth.php';
require_once __DIR__ . '/../../src/Endpoint/Product/Data.php';

// Fetch product data
$auth = new Auth('{API_KEY}');
$data = new Data($auth);
$data->addPart('BBWQ', '71-2591');
$data->addPart('BBWQ', '00283');
print_r($data->getData());
