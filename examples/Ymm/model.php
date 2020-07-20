<?php

use AAM\Api\Endpoint\Auth;
use AAM\Api\Endpoint\Ymm\Model;

require_once __DIR__ . '../../../src/Request.php';
require_once __DIR__ . '../../../src/endpoint/Auth.php';
require_once __DIR__ . '../../../src/endpoint/Ymm/Model.php';

// Fetch list of models
$auth = new Auth('{API_KEY}');
$model = new Model($auth);
$model->setYear(2020);
$model->setMakeId(47);
print_r($model->getModels());
