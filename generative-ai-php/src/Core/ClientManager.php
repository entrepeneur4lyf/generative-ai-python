<?php

declare(strict_types=1);

namespace Google\GenerativeAI\Core;

use Google\GenerativeAI\GenerativeAIClient;
use Google\GenerativeAI\Exceptions\GenerativeAIException;
use Google\GenerativeAI\Exceptions\InvalidArgumentException;
use Google\GenerativeAI\Exceptions\ApiException;
use Google\GenerativeAI\Exceptions\ConfigurationException;

class ClientManager
{
    private static ?GenerativeAIClient $client = null;

    /**
     * Configure the default client with the given API key.
     *
     * @param string|null $apiKey The API key to use for authentication.
     *
     * @throws GenerativeAIException If the API key is not provided.
     */
    /**
     * Configure the default client with the given API key.
     *
     * @param string|null $apiKey The API key to use for authentication.
     *
     * @throws GenerativeAIException If the API key is not provided.
     */
    public static function configure(?string $apiKey = null): void
    {
        if (self::$client === null) {
            self::$client = new GenerativeAIClient($apiKey);
        }
    }

    /**
     * Get the default client instance.
     *
     * @return GenerativeAIClient The default client instance.
     *
     * @throws GenerativeAIException If the client is not configured.
     */
    /**
     * Get the default client instance.
     *
     * @return GenerativeAIClient The default client instance.
     *
     * @throws GenerativeAIException If the client is not configured.
     */
    public static function getClient(): GenerativeAIClient
    {
        if (self::$client === null) {
            throw new GenerativeAIException('Client is not configured. Call configure() first.');
        }
        return self::$client;
    }
}
