<?php

namespace AAM\Api\Endpoint\Ymm;

use AAM\Api\Endpoint\Auth;
use AAM\Api\Request;

class Year extends Auth
{
    protected $data = [];

    public function __construct($auth = null)
    {
        parent::__construct($auth);
    }

    /**
     * Fetches a list of years.
     * @return array Response from the Years endpoint.
     */
    public function getYears(): array
    {
        $req = new Request();
        return $req->call('GET', 'ymm/year', array_filter($this->data), $this->getAuthHeader());
    }
}
