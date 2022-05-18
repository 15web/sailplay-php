<?php

namespace Studio15\SailPlay\SDK\Api\Users\AddUser;

use Exception;
use Studio15\SailPlay\SDK\Api\Errors\InvalidTokenException;
use Studio15\SailPlay\SDK\Api\Users\AddUser\Response\AddUserResponse;
use Studio15\SailPlay\SDK\Api\Users\UserNotFoundException;
use Studio15\SailPlay\SDK\Infrastructure\ApiHttpClient;
use Studio15\SailPlay\SDK\Infrastructure\Error\ApiErrorException;
use Throwable;

final class AddUser
{
    private const RESOURCE_PATH = 'users/add';

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
    public function __invoke(AddUserRequest $addRequest, string $token): AddUserResponse
    {
        try {
            $infoResponse = $this->apiClient->get(
                self::RESOURCE_PATH,
                AddUserResponse::class,
                $addRequest,
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

        if ($code === -7) {
            return new InvalidTokenException($apiErrorException);
        }

        return $apiErrorException;
    }
}
