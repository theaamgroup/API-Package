<?php

namespace AAM\Api\Endpoint\Ymm;

use AAM\Api\Endpoint\Auth;
use AAM\Api\Request;

class Make extends Auth
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
     * Fetches a list of makes for a given year.
     * @return array Response from the Makes endpoint.
     */
    public function getMakes(): array
    {
        $req = new Request();
        return $req->call('GET', 'ymm/make', array_filter($this->data), $this->getAuthHeader());
    }
}
