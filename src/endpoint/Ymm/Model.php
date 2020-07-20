<?php

namespace AAM\Api\Endpoint\Ymm;

use AAM\Api\Endpoint\Auth;
use AAM\Api\Request;

class Model extends Auth
{
    protected $data = [];

    public function __construct($auth = null)
    {
        parent::__construct($auth);
    }

    /**
     * Sets the year for the request.
     * @param int $year The year to use for the request
     */
    public function setYear(int $year): void
    {
        $this->data['year'] = $year;
    }

    /**
     * Sets the Make ID for the request.
     * @param int $make_id The Make ID to use for the request
     */
    public function setMakeId(int $make_id): void
    {
        $this->data['make_id'] = $make_id;
    }

    /**
     * Fetches a list of models for a given year and make.
     * @return array Response from the Makes endpoint.
     */
    public function getModels(): array
    {
        $req = new Request();
        return $req->call('GET', 'ymm/model', array_filter($this->data), $this->getAuthHeader());
    }
}
