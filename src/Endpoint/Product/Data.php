<?php

namespace AAM\Api\Endpoint\Product;

use AAM\Api\Endpoint\Auth;
use AAM\Api\Request;

class Data extends Auth
{
    protected $data = [];

    public function __construct($auth = null)
    {
        parent::__construct($auth);
    }

    /**
     * Adds a part to the batch.
     * @param string $aaia The AAIA brand code
     * @param string $part_number The part number
     */
    public function addPart(string $aaia, string $part_number): void
    {
        $this->data['parts'][] = ['aaia' => $aaia, 'part_number' => $part_number];
    }

    /**
     * Fetches data for the batch of parts.
     * @return array Response from the Product endpoint.
     */
    public function getData(): array
    {
        $req = new Request();
        return $req->call('POST', 'product/data', array_filter($this->data), $this->getAuthHeader());
    }
}
