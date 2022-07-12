<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Promocodes\ListGroups;

use Studio15\SailPlay\SDK\Api\Promocodes\ListGroups\Response\ListPromocodesGroupsResponse;
use Studio15\SailPlay\SDK\Infrastructure\ApiHttpClient;
use Studio15\SailPlay\SDK\Infrastructure\Error\ApiErrorException;
use Throwable;

/**
 * @see https://ru.sailplay.dev/reference/promocodes-groups-list
 */
final class ListPromocodesGroups
{
    private const RESOURCE_PATH = 'promocodes/groups/list';

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
        ListPromocodesGroupsRequest $listPromocodesGroupsRequest,
        string $token
    ): ListPromocodesGroupsResponse {
        return $this->apiClient->get(
            self::RESOURCE_PATH,
            ListPromocodesGroupsResponse::class,
            $listPromocodesGroupsRequest,
            $token
        );
    }
}
