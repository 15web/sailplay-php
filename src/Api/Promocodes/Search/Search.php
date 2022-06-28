<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Promocodes\Search;

use Studio15\SailPlay\SDK\Api\Promocodes\Search\Response\SearchResponse;
use Studio15\SailPlay\SDK\Infrastructure\ApiHttpClient;
use Studio15\SailPlay\SDK\Infrastructure\Error\ApiErrorException;
use Throwable;

/**
 * @see https://ru.sailplay.dev/reference/promocodes-search
 */
final class Search
{
    private const RESOURCE_PATH = 'promocodes/search';

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
    public function __invoke(SearchRequest $searchRequest, string $token): SearchResponse
    {
        return $this->apiClient->get(
            self::RESOURCE_PATH,
            SearchResponse::class,
            $searchRequest,
            $token
        );
    }
}
