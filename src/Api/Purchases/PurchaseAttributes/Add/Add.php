<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\Add;

use Studio15\SailPlay\SDK\Infrastructure\ApiHttpClient;
use Studio15\SailPlay\SDK\Infrastructure\Error\ApiErrorException;
use Throwable;

/**
 * @see https://ru.sailplay.dev/reference/purchases-purchase-attributes-add
 */
final class Add
{
    public const VALUE_TYPES = ['str', 'float', 'text', 'date', 'bool'];
    private const RESOURCE_PATH = 'purchases/purchase-attributes/add';

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
    public function __invoke(AddRequest $addRequest, string $token): AddResponse
    {
        return $this->apiClient->post(
            self::RESOURCE_PATH,
            AddResponse::class,
            $addRequest,
            $token
        );
    }
}
