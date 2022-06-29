<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Promocodes\ListForUser;

use Studio15\SailPlay\SDK\Api\Promocodes\ListForUser\Response\ListForUserResponse;
use Studio15\SailPlay\SDK\Infrastructure\ApiHttpClient;
use Studio15\SailPlay\SDK\Infrastructure\Error\ApiErrorException;
use Throwable;

/**
 * @see https://ru.sailplay.dev/reference/promocodes-list-for-user
 */
final class ListForUser
{
    private const RESOURCE_PATH = 'promocodes/list-for-user';

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
    public function __invoke(ListForUserRequest $listForUserRequest, string $token): ListForUserResponse
    {
        return $this->apiClient->get(
            self::RESOURCE_PATH,
            ListForUserResponse::class,
            $listForUserRequest,
            $token
        );
    }
}
