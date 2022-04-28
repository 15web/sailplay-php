<?php

namespace Studio15\SailPlay\SDK\Api\Login;

use Studio15\SailPlay\SDK\Infrastructure\ApiHttpClient;

final class Login
{
    private const RESOURCE_PATH = 'login';

    /**
     * @var ApiHttpClient
     */
    private $apiClient;

    public function __construct(ApiHttpClient $client)
    {
        $this->apiClient = $client;
    }

    public function __invoke(LoginRequest $loginRequest): LoginResponse
    {
        return $this->apiClient->post(self::RESOURCE_PATH, LoginResponse::class, $loginRequest);
    }
}
