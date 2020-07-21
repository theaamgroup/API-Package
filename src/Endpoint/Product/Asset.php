<?php

namespace AAM\Api\Endpoint\Product;

use AAM\Api\Endpoint\Auth;
use AAM\Api\Request;

class Asset extends Auth
{
    protected $data = [];

    public function __construct($auth = null)
    {
        parent::__construct($auth);
    }

    /**
     * Sets the AAM YouTube project key for the request.
     * @param string $project_key The AAM YouTube project key
     */
    public function setProjectKey(string $project_key): void
    {
        $this->data['project_key'] = $project_key;
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
     * Fetches a list of assets.
     * @return array Response from the Asset endpoint.
     */
    public function getAssets(): array
    {
        $req = new Request();
        return $req->call('GET', 'product/asset', array_filter($this->data), $this->getAuthHeader());
    }
}
