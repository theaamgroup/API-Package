<?php

namespace AAM\Api\Endpoint\Ymm;

use AAM\Api\Endpoint\Auth;
use AAM\Api\Request;

class Validate extends Auth
{
    protected $data = [];

    public function __construct($auth = null)
    {
        parent::__construct($auth);
    }

    /**
     * Sets the brand code for the request.
     * @param string $brand_code The brand code
     */
    public function setBrandCode(string $brand_code): void
    {
        $this->data['brand_code'] = $brand_code;
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
     * Sets the year for the request.
     * @param int $year The year for the vehicle
     */
    public function setYear(int $year): void
    {
        $this->data['year'] = $year;
    }

    /**
     * Sets the make ID for the request.
     * @param int $make_id The make ID for the vehicle
     */
    public function setMakeId(int $make_id): void
    {
        $this->data['make_id'] = $make_id;
    }

    /**
     * Sets the model ID for the request.
     * @param int $model_id The model ID for the vehicle
     */
    public function setModelId(int $model_id): void
    {
        $this->data['model_id'] = $model_id;
    }

    /**
     * Fetches the validation result for a given part and vehicle.
     * @return array Response from the Validate endpoint.
     */
    public function validate(): array
    {
        $req = new Request();
        return $req->call('GET', 'ymm/validate', array_filter($this->data), $this->getAuthHeader());
    }
}
