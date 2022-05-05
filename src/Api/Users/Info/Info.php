<?php

namespace Studio15\SailPlay\SDK\Api\Users\Info;

use Studio15\SailPlay\SDK\Infrastructure\ApiHttpClient;
use Studio15\SailPlay\SDK\Infrastructure\Error\ApiErrorException;
use Throwable;

final class Info
{
    private const RESOURCE_URI = 'users/info';

    /**
     * @var ApiHttpClient
     */
    private $apiClient;

    public function __construct(ApiHttpClient $client)
    {
        $this->apiClient = $client;
    }

    /**
     * @throws ApiErrorException
     * @throws Throwable
     */
    public function __invoke(InfoRequest $infoRequest, string $token): infoResponse
    {
        return $this->apiClient->get(
            self::RESOURCE_URI,
            infoResponse::class,
            $infoRequest,
            $token
        );
    }
}
