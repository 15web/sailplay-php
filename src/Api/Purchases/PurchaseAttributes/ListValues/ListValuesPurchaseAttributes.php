<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\ListValues;

use Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\ListValues\Response\ListValuesPurchaseAttributesResponse;
use Studio15\SailPlay\SDK\Infrastructure\ApiHttpClient;
use Studio15\SailPlay\SDK\Infrastructure\Error\ApiErrorException;
use Throwable;

/**
 * @see https://ru.sailplay.dev/reference/purchases-purchase-attributes-values-list
 */
final class ListValuesPurchaseAttributes
{
    private const RESOURCE_PATH = 'purchases/purchase-attributes/values/list';

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
        ListValuesPurchaseAttributesRequest $listRequest,
        string $token
    ): ListValuesPurchaseAttributesResponse {
        return $this->apiClient->get(
            self::RESOURCE_PATH,
            ListValuesPurchaseAttributesResponse::class,
            $listRequest,
            $token
        );
    }
}
