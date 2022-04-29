<?php

namespace Studio15\SailPlay\SDK\Api\Users\Info;

use Studio15\SailPlay\SDK\Infrastructure\ApiHttpClient;

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
