<?php

namespace AAM\Api;

class Request
{
    const API_URL = 'https://aam.dev/';

    protected $error;
    protected $status_code = 0;
    protected $result;
    protected $response = [];

    /**
     * Get the HTTP status code from the last API call.
     * @return int The HTTP status code from the last call.
     */
    public function getStatusCode(): int
    {
        return $this->status_code;
    }

    /**
     * Get the error message from the last API call.
     * @return string The error from the last call.
     */
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * Get the result from the last API call.
     * @return mixed The result from the last call.
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Get the response from the last API call.
     * @return array The response formatted as an array containing "status", "error", and "result" values.
     */
    public function getResponse(): array
    {
        return $this->response;
    }

    /**
     * Return whether the last request had a status code in the 200s or 300s and no error.
     * @return bool Whether the last request was successful or not.
     */
    public function success(): bool
    {
        return !$this->error && $this->status_code >= 200 && $this->status_code < 400;
    }

    /**
     * Sends a request to AAM's API and returns the response.
     * @param string $method The type of request (GET, POST, PUT, DELETE).
     * @param string $endpoint The API endpoint to call.
     * @param array $data The data to pass as parameters to the API.
     * @param array $headers Optional headers to pass in the API request.
     * @return array The response formatted as an array containing "status", "error", and "result" values.
     */
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

        if ($headers) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }

        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $result = curl_exec($curl);
        $this->result = $this->isJSON($result) ? json_decode($result, true) : $result;

        if (!empty($this->result['error'])) {
            $this->error = $this->result['messages']['error'] ?? $this->result['error'];
        }

        $this->status_code = (int) curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $this->response = [
            'status' => $this->status_code,
            'error' => $this->error,
            'result' => $this->success() ? $this->result : ''
        ];

        return $this->response;
    }

    protected function isJSON(string $string): bool
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }
}
