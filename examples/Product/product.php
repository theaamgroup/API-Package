<?php

use AAM\Api\Endpoint\Auth;
use AAM\Api\Endpoint\Product\Product;

require_once __DIR__ . '/../../src/Request.php';
require_once __DIR__ . '/../../src/Endpoint/Auth.php';
require_once __DIR__ . '/../../src/Endpoint/Product/Product.php';

// Fetch list of products
$auth = new Auth('{API_KEY}');
$asset = new Product($auth);
$asset->setAAIA('BBWQ');
$asset->setPartNumber('99-50');
$asset->setLimit(5);
print_r($asset->getProduct());
