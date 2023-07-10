<?php

namespace AAM\Api\Endpoint;

use AAM\Api\Request;

class Store extends Auth
{
    protected $data = [];

    public function __construct($auth = null)
    {
        parent::__construct($auth);
    }

    /**
     * Sets the latitude for the request.
     * @param float $lat The latitude
     */
    public function setLatitude(float $lat): void
    {
        $this->data['lat'] = $lat;
    }

    /**
     * Sets the longitude for the request.
     * @param float $lng The longitude
     */
    public function setLongitude(float $lng): void
    {
        $this->data['lng'] = $lng;
    }

    /**
     * Sets the distance for the request.
     * @param float $distance The distance
     */
    public function setDistance(int $distance): void
    {
        $this->data['distance'] = $distance;
    }

    /**
     * Sets the start for the request.
     * @param float $start The start
     */
    public function setStart(int $start): void
    {
        $this->data['start'] = $start;
    }

    /**
     * Sets the limit for the request.
     * @param float $limit The limit
     */
    public function setLimit(int $limit): void
    {
        $this->data['limit'] = $limit;
    }

    /**
     * Sets the id for the request.
     * @param int $id The id
     */
    public function setId(int $id): void
    {
        $this->data['id'] = $id;
    }

    /**
     * Fetches the list of stores.
     * @return array Response from the Store endpoint.
     */
    public function getStores(): array
    {
        $req = new Request();
        return $req->call('GET', 'store', $this->data, $this->getAuthHeader());
    }

    /**
     * Fetches the list of PRO Rebate stores.
     * @return array Response from the Store endpoint.
     */
    public function getProRebateStores(): array
    {
        $req = new Request();
        return $req->call('GET', 'store/pro_rebate', $this->data, $this->getAuthHeader());
    }
}
