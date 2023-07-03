<?php

use AAM\Api\Endpoint\Auth;
use AAM\Api\Endpoint\Product\Inventory;

require_once __DIR__ . '/../../src/Request.php';
require_once __DIR__ . '/../../src/Endpoint/Auth.php';
require_once __DIR__ . '/../../src/Endpoint/Product/Inventory.php';

// Fetch inventory
$auth = new Auth('{API_KEY}');
$inventory = new Inventory($auth);
$inventory->setWarehouseCode('NPW');
$inventory->setAAIA('BBWQ');
$inventory->setPartNumber('99-5050');
print_r($inventory->getInventory());
