<?php

namespace AAM\Api\Endpoint;

use AAM\Api\Request;

class Prop65
{
    protected $aaia = '';
    protected $part_number = '';
    protected $search = '';
    protected $generic = false;
    protected $limit = 1;
    protected $format = 'json';

    public function setAAIA(string $aaia): void
    {
        $this->aaia = $aaia;
    }

    public function setPartNumber(string $part_number): void
    {
        $this->part_number = $part_number;
    }

    public function setSearch(string $search): void
    {
        $this->search = $search;
    }

    public function setGeneric(bool $generic): void
    {
        $this->generic = $generic;
    }

    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    public function setFormat(string $format): void
    {
        $this->format = $format;
    }

    public function getMessage(): string
    {
        $req = new Request();

        $res = $req->call('GET', 'prop65', [
            'aaia' => $this->aaia,
            'part_number' => $this->part_number,
            'search' => $this->search,
            'generic' => $this->generic,
            'limit' => $this->limit,
            'format' => $this->format
        ]);

        if ($this->format === 'json') {
            return $res['message'] ?? '';
        }

        return $res ?? '';
    }
}
