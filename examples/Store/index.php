<?php

use AAM\Api\Endpoint\Auth;
use AAM\Api\Endpoint\Store;

require_once __DIR__ . '/../../src/Request.php';
require_once __DIR__ . '/../../src/Endpoint/Auth.php';
require_once __DIR__ . '/../../src/Endpoint/Store.php';

$auth = new Auth('{API_KEY}');
$store = new Store($auth);
$store->setLatitude(36.3152229);
$store->setLongitude(-82.3519357);
$store->setDistance(25);
$store->setStart(0);
$store->setLimit(10);
print_r($store->getStores());
