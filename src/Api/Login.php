<?php

namespace Studio15\SailPlay\SDK\Api;

use Psr\Http\Message\ResponseInterface;
use Studio15\SailPlay\SDK\Http\Client;

final class Login
{
    private const RESOURCE_URI = 'login';

    /**
     * @var Client
     */
    private $apiClient;

    public function __construct(Client $client)
    {
        $this->apiClient = $client;
    }

    public function __invoke(): ResponseInterface
    {
        return $this->apiClient->post(self::RESOURCE_URI);
    }
}
