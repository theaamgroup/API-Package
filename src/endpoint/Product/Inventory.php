<?php

namespace AAM\Api\Endpoint\Product;

use AAM\Api\Endpoint\Auth;
use AAM\Api\Request;

class Inventory extends Auth
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
     * Sets the warehouse code for the request.
     * @param string $warehouse_code The warehouse code
     */
    public function setWarehouseCode(string $warehouse_code): void
    {
        $this->data['warehouse_code'] = $warehouse_code;
    }

    /**
     * Fetches the inventory for a product by a given warehouse.
     * @return array Response from the Inventory endpoint.
     */
    public function getInventory(): array
    {
        $req = new Request();
        return $req->call('GET', 'product/inventory', array_filter($this->data), $this->getAuthHeader());
    }
}
