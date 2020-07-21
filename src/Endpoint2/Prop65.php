<?php

namespace AAM\Api\Endpoint;

use AAM\Api\Request;

class Prop65
{
    protected $data = [
        'aaia' => '',
        'part_number' => '',
        'search' => '',
        'generic' => false,
        'limit' => null,
        'format' => ''
    ];

    /**
     * Sets the AAIA brand code for the request. Required if Part Number is set.
     * @param string $aaia AAIA brand code
     */
    public function setAAIA(string $aaia): void
    {
        $this->data['aaia'] = $aaia;
    }

    /**
     * Sets the Part Number for the request. Optional
     * @param string $part_number Part number
     */
    public function setPartNumber(string $part_number): void
    {
        $this->data['part_number'] = $part_number;
    }

    /**
     * Sets the part number search string for the request. Optional
     * @param string $search Part number search fragment
     */
    public function setSearch(string $search): void
    {
        $this->data['search'] = $search;
    }

    /**
     * Sets whether the generic Prop 65 message should be used. Optional
     * @param bool $generic Default: false
     */
    public function setGeneric(bool $generic): void
    {
        $this->data['generic'] = $generic;
    }

    /**
     * Sets the number of items that should be returned from the request. Optional
     * @param int $limit Number of results to return. Default: 10
     */
    public function setLimit(int $limit): void
    {
        $this->data['limit'] = $limit;
    }

    /**
     * Sets the format of the response. Optional
     * @param string $format Format of the response ("json" or "html"). Default: html
     */
    public function setFormat(string $format): void
    {
        $this->data['format'] = strtolower($format);
    }

    /**
     * Fetches the Prop 65 message text for one part.
     * @return array Response from the Prop 65 endpoint.
     */
    public function getMessage(): array
    {
        $req = new Request();
        return $req->call('GET', 'prop65', array_filter($this->data));
    }

    /**
     * Fetches the Prop 65 messages and details for multiple parts. Used for searching.
     * @return array Response from the Prop 65 endpoint.
     */
    public function getParts(): array
    {
        $this->data['format'] = 'json';
        $this->data['limit'] = $this->data['limit'] ?? 10;
        $req = new Request();
        return $req->call('GET', 'prop65', array_filter($this->data));
    }
}
