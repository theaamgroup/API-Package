<?php

namespace AAM\Api;

class Request
{
    const API_URL = 'https://aam.dev/';

    protected $api_key;
    protected $error;
    protected $status_code = 0;

    public function __construct(string $api_key = null)
    {
        $this->api_key = $api_key;
    }

    public function setApiKey(string $api_key): void
    {
        $this->api_key = $api_key;
    }

    public function getStatusCode(): int
    {
        return $this->status_code;
    }

    public function call(string $method, string $endpoint, array $data = [], array $headers = []): array
    {
        $url = self::API_URL . trim($endpoint, '/');
        $method = strtoupper($method);
        $curl = curl_init();

        switch ($method) {
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, 1);
                break;
            case 'PUT':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                break;
            default:
                if ($data) {
                    $url = sprintf('%s?%s', $url, http_build_query($data));
                }
        }

        if ($data && in_array($method, ['POST', 'PUT'])) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }

        curl_setopt($curl, CURLOPT_URL, $url);

        if ($this->api_key) {
            $headers[] = "APIKEY: {$this->api_key}";
        }

        if ($headers) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $result = curl_exec($curl);
        $this->status_code = (int) curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        return json_decode($result, true);
    }
}
