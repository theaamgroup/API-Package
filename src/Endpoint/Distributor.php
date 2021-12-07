<?php

namespace AAM\Api\Endpoint;

use AAM\Api\Request;

class Distributor extends Auth
{
    protected $data = [];

    public function __construct($auth = null)
    {
        parent::__construct($auth);
    }

    /**
     * Sets the name of the distributor for the request.
     * @param string $name The name of the distributor
     */
    public function setName(string $name): void
    {
        $this->data['name'] = $name;
    }

    /**
     * Sets the code of the distributor for the request.
     * @param string $code The code of the distributor
     */
    public function setCode(string $code): void
    {
        $this->data['code'] = $code;
    }

    /**
     * Fetches the information for a distributor.
     * @return array Response from the Distributor endpoint.
     */
    public function getDistributor(): array
    {
        $req = new Request();
        return $req->call('GET', 'distributor', array_filter($this->data), $this->getAuthHeader());
    }

    /**
     * Fetches the warehouses for a distributor.
     * @return array Response from the Distributor warehouses endpoint.
     */
    public function getWarehouses(): array
    {
        $req = new Request();
        return $req->call('GET', 'distributor/warehouses', array_filter($this->data), $this->getAuthHeader());
    }

    /**
     * Fetches a list of brands carried by the warehouse.
     * @return array Response from the Distributor warehouse brands endpoint.
     */
    public function getBrands(): array
    {
        $req = new Request();
        return $req->call('GET', 'distributor/brands', array_filter($this->data), $this->getAuthHeader());
    }
}
