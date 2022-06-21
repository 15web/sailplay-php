<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Promocodes\Activate;

use Studio15\SailPlay\SDK\Infrastructure\ApiHttpClient;
use Studio15\SailPlay\SDK\Infrastructure\Error\ApiErrorException;
use Throwable;

/**
 * @see https://ru.sailplay.dev/reference/promocodes-activate
 */
final class Activate
{
    private const RESOURCE_PATH = 'promocodes/activate';

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
    public function __invoke(ActivateRequest $activateRequest, string $token): ActivateResponse
    {
        return $this->apiClient->post(
            self::RESOURCE_PATH,
            ActivateResponse::class,
            $activateRequest,
            $token
        );
    }
}
