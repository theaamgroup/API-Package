<?php

use AAM\Api\Endpoint\Prop65;

require_once __DIR__ . '/../../src/Request.php';
require_once __DIR__ . '/../../src/Endpoint/Prop65.php';

// Fetch Prop 65 message for one part. Default response format is HTML
$prop65 = new Prop65();
$prop65->setAAIA('BBWQ');
$prop65->setPartNumber('71-2591');
print_r($prop65->getMessage());

// Fetch Prop 65 messages for several parts. Default response format is JSON
$prop65 = new Prop65();
$prop65->setAAIA('BBWQ');
$prop65->setSearch('71-');
$prop65->setLimit(3);
print_r($prop65->getParts());

// Fetch generic Prop 65 message
$prop65 = new Prop65();
$prop65->setGeneric(true);
$prop65->setFormat('json');
print_r($prop65->getMessage());
