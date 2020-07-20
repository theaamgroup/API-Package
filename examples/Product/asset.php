<?php

use AAM\Api\Endpoint\Auth;
use AAM\Api\Endpoint\Product\Asset;

require_once __DIR__ . '../../../src/Request.php';
require_once __DIR__ . '../../../src/endpoint/Auth.php';
require_once __DIR__ . '../../../src/endpoint/Product/Asset.php';

// Fetch list of assets
$auth = new Auth('{API_KEY}');
$asset = new Asset($auth);
$asset->setProjectKey('aam');
$asset->setAAIA('BBWQ');
$asset->setPartNumber('71-2591');
print_r($asset->getAssets());
