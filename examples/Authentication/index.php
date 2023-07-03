<?php

use AAM\Api\Endpoint\Auth;
use AAM\Api\Endpoint\Distributor;
use AAM\Api\Endpoint\Manufacturer;

require_once __DIR__ . '/../../src/Request.php';
require_once __DIR__ . '/../../src/Endpoint/Auth.php';
require_once __DIR__ . '/../../src/Endpoint/Distributor.php';
require_once __DIR__ . '/../../src/Endpoint/Manufacturer.php';

// There are several ways to authenticate you API calls.
// Each method below yields the same result.

// 1. Useful if calling multiple endpoints with the same authentication
$auth = new Auth('{API_KEY}');
$endpoint1 = new Manufacturer($auth);
$endpoint2 = new Distributor($auth);

// 2. Useful if only calling one endpoint
$endpoint = new Manufacturer('{API_KEY}');

// 3.
$auth = new Auth();
$auth->setApiKey('{API_KEY}');
$endpoint = new Manufacturer($auth);

// 4.
$endpoint = new Manufacturer();
$endpoint->setApiKey('{API_KEY}');
