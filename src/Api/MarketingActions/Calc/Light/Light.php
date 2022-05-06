<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\MarketingActions\Calc\Light;

use Studio15\SailPlay\SDK\Infrastructure\ApiHttpClient;
use Studio15\SailPlay\SDK\Infrastructure\Error\ApiErrorException;
use Throwable;

/**
 * @see https://ru.sailplay.dev/reference/marketing-actions-calc-light
 */
final class Light
{
    private const RESOURCE_PATH = 'marketing-actions/calc/light';

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
    public function __invoke(LightRequest $infoRequest, string $token): LightResponse
    {
        return $this->apiClient->get(
            self::RESOURCE_PATH,
            LightResponse::class,
            $infoRequest,
            $token
        );
    }
}
