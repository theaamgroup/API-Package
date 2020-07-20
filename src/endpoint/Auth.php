<?php

namespace AAM\Api\Endpoint;

class Auth
{
    protected $api_key = '';

    public function __construct($auth = null)
    {
        if ($auth instanceof Auth) {
            $this->api_key = $auth->getApiKey();
        } elseif (is_string($auth) && !empty($auth)) {
            $this->api_key = $auth;
        }
    }

    public function setApiKey(string $api_key): void
    {
        $this->api_key = $api_key;
    }

    public function getApiKey(): string
    {
        return $this->api_key;
    }

    protected function getAuthHeader(): array
    {
        return $this->api_key ? ["X-API-KEY: {$this->api_key}"] : [];
    }
}
