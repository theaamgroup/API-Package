<?php

use AAM\Api\Endpoint\Auth;
use AAM\Api\Endpoint\Distributor;

require_once __DIR__ . '/../../src/Request.php';
require_once __DIR__ . '/../../src/Endpoint/Auth.php';
require_once __DIR__ . '/../../src/Endpoint/Distributor.php';

$auth = new Auth('{API_KEY}');

// Fetch distributor by code
$distributor = new Distributor($auth);
$distributor->setCode('CSI');
print_r($distributor->getDistributor());

// Fetch distributor by name
$distributor = new Distributor($auth);
$distributor->setName('Toys for Trucks');
print_r($distributor->getDistributor());

// Fetch warehouses for distributor
$distributor = new Distributor($auth);
$distributor->setCode('MWW');
print_r($distributor->getWarehouses());

// Fetch brands carried by warehouse(s)
$distributor = new Distributor($auth);
$distributor->setCode('APA,TS1');
print_r($distributor->getBrands());
