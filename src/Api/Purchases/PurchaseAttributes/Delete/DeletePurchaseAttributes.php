<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\Delete;

use Studio15\SailPlay\SDK\Infrastructure\ApiHttpClient;
use Studio15\SailPlay\SDK\Infrastructure\Error\ApiErrorException;
use Throwable;

/**
 * @see https://ru.sailplay.dev/reference/purchases-purchase-attributes-delete
 */
final class DeletePurchaseAttributes
{
    private const RESOURCE_PATH = 'purchases/purchase-attributes/delete';

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
    public function __invoke(
        DeletePurchaseAttributesRequest $deleteRequest,
        string $token
    ): DeletePurchaseAttributesResponse {
        return $this->apiClient->post(
            self::RESOURCE_PATH,
            DeletePurchaseAttributesResponse::class,
            $deleteRequest,
            $token
        );
    }
}
