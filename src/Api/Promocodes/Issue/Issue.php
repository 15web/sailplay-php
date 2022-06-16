<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Promocodes\Issue;

use Studio15\SailPlay\SDK\Api\Promocodes\Issue\Response\IssueResponse;
use Studio15\SailPlay\SDK\Infrastructure\ApiHttpClient;
use Studio15\SailPlay\SDK\Infrastructure\Error\ApiErrorException;
use Throwable;

/**
 * @see https://ru.sailplay.dev/reference/promocodes-issue
 */
final class Issue
{
    private const RESOURCE_PATH = 'promocodes/issue';

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
    public function __invoke(IssueRequest $issueRequest, string $token): IssueResponse
    {
        return $this->apiClient->post(
            self::RESOURCE_PATH,
            IssueResponse::class,
            $issueRequest,
            $token
        );
    }
}
