<?php

namespace AAM\Api\Endpoint;

use AAM\Api\Request;

class Manufacturer extends Auth
{
    protected $data = [];

    public function __construct($auth = null)
    {
        parent::__construct($auth);
    }

    /**
     * Sets the name of the manufacturer for the request.
     * @param string $name The name of the manufacturer
     */
    public function setName(string $name): void
    {
        $this->data['name'] = $name;
    }

    /**
     * Sets the AAIA brand code of the manufacturer for the request.
     * @param string $aaia The AAIA brand code of the manufacturer
     */
    public function setAAIA(string $aaia): void
    {
        $this->data['aaia'] = $aaia;
    }

    /**
     * Fetches the information for a manufacturer.
     * @return array Response from the Manufacturer endpoint.
     */
    public function getManufacturer(): array
    {
        $req = new Request();
        return $req->call('GET', 'manufacturer', array_filter($this->data), $this->getAuthHeader());
    }
}
