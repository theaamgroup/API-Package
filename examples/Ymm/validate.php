<?php

use AAM\Api\Endpoint\Auth;
use AAM\Api\Endpoint\Ymm\Validate;

require_once __DIR__ . '/../../src/Request.php';
require_once __DIR__ . '/../../src/Endpoint/Auth.php';
require_once __DIR__ . '/../../src/Endpoint/Ymm/Validate.php';

// Fetch list of models
$auth = new Auth('{API_KEY}');
$validate = new Validate($auth);
$validate->setBrandCode('BBWQ');
$validate->setPartNumber('63-3109');
$validate->setYear(2020);
$validate->setMakeId(47); // Chevrolet
$validate->setModelId(491); // Silverado 1500
print_r($validate->validate());
