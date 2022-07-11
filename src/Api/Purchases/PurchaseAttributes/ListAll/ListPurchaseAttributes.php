<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\ListAll;

use Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\ListAll\Response\ListPurchaseAttributesResponse;
use Studio15\SailPlay\SDK\Infrastructure\ApiHttpClient;
use Studio15\SailPlay\SDK\Infrastructure\Error\ApiErrorException;
use Throwable;

/**
 * @see https://ru.sailplay.dev/reference/purchases-purchase-attributes-list
 */
final class ListPurchaseAttributes
{
    private const RESOURCE_PATH = 'purchases/purchase-attributes/list';

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
        ListPurchaseAttributesRequest $listRequest,
        string $token
    ): ListPurchaseAttributesResponse {
        return $this->apiClient->get(
            self::RESOURCE_PATH,
            ListPurchaseAttributesResponse::class,
            $listRequest,
            $token
        );
    }
}
