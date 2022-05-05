<?php

namespace Studio15\SailPlay\SDK\Api\Users\Info;

use Exception;
use Studio15\SailPlay\SDK\Api\Errors\InvalidTokenException;
use Studio15\SailPlay\SDK\Api\Users\Info\Response\infoResponse;
use Studio15\SailPlay\SDK\Api\Users\UserNotFoundException;
use Studio15\SailPlay\SDK\Infrastructure\ApiHttpClient;
use Studio15\SailPlay\SDK\Infrastructure\Error\ApiErrorException;
use Throwable;

final class Info
{
    private const RESOURCE_PATH = 'users/info';

    /**
     * @var ApiHttpClient
     */
    private $apiClient;

    public function __construct(ApiHttpClient $client)
    {
        $this->apiClient = $client;
    }

    /**
     * @throws UserNotFoundException
     * @throws ApiErrorException
     * @throws Throwable
     */
    public function __invoke(InfoRequest $infoRequest, string $token): infoResponse
    {
        try {
            $infoResponse = $this->apiClient->get(
                self::RESOURCE_PATH,
                infoResponse::class,
                $infoRequest,
                $token
            );
        } catch (ApiErrorException $apiErrorException) {
            throw $this->resolveApiError($apiErrorException);
        }

        return $infoResponse;
    }

    private function resolveApiError(ApiErrorException $apiErrorException): Exception
    {
        $code = $apiErrorException->getCode();

        if ($code === -4000) {
            return new UserNotFoundException($apiErrorException);
        }

        if ($code === -7) {
            return new InvalidTokenException($apiErrorException);
        }

        return $apiErrorException;
    }
}
