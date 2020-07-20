<?php

namespace AAM\Api\Endpoint\Product;

use AAM\Api\Endpoint\Auth;
use AAM\Api\Request;

class Product extends Auth
{
    protected $data = [];

    public function __construct($auth = null)
    {
        parent::__construct($auth);
    }

    /**
     * Sets the part number for the request.
     * @param string $part_number The part number
     */
    public function setPartNumber(string $part_number): void
    {
        $this->data['part_number'] = $part_number;
    }

    /**
     * Sets the AAIA brand code for the request.
     * @param string $aaia The AAIA brand code
     */
    public function setAAIA(string $aaia): void
    {
        $this->data['aaia'] = $aaia;
    }

    /**
     * Sets the limit for the request.
     * @param int $limit The number of results to return. Default: 5
     */
    public function setLimit(int $limit): void
    {
        $this->data['limit'] = $limit;
    }

    /**
     * Fetches information about a product.
     * @return array Response from the Product endpoint.
     */
    public function getProduct(): array
    {
        $req = new Request();
        return $req->call('GET', 'product/product', array_filter($this->data), $this->getAuthHeader());
    }
}
