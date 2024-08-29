<?php

declare(strict_types=1);

namespace Google\GenerativeAI;

/**
 * Class ApiRequest
 * Represents a generic API request.
 */
class ApiRequest
{
    public string $endpoint;
    public array $parameters;

    public function __construct(string $endpoint, array $parameters = [])
    {
        $this->endpoint = $endpoint;
        $this->parameters = $parameters;
    }
}

/**
 * Class ApiResponse
 * Represents a generic API response.
 */
class ApiResponse
{
    public int $statusCode;
    public array $data;

    public function __construct(int $statusCode, array $data = [])
    {
        $this->statusCode = $statusCode;
        $this->data = $data;
    }
}
