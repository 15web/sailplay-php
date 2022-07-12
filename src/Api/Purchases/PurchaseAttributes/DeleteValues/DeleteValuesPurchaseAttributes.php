<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\DeleteValues;

use Studio15\SailPlay\SDK\Infrastructure\ApiHttpClient;
use Studio15\SailPlay\SDK\Infrastructure\Error\ApiErrorException;
use Throwable;

/**
 * @see https://ru.sailplay.dev/reference/purchases-purchase-attributes-values-delete
 */
final class DeleteValuesPurchaseAttributes
{
    private const RESOURCE_PATH = 'purchases/purchase-attributes/values/delete';

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
        DeleteValuesPurchaseAttributesRequest $deleteValuesRequest,
        string $token
    ): DeleteValuesPurchaseAttributesResponse {
        return $this->apiClient->post(
            self::RESOURCE_PATH,
            DeleteValuesPurchaseAttributesResponse::class,
            $deleteValuesRequest,
            $token
        );
    }
}
