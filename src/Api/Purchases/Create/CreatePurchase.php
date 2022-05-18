<?php

namespace Studio15\SailPlay\SDK\Api\Purchases\Create;

use Exception;
use Studio15\SailPlay\SDK\Api\Errors\InvalidTokenException;
use Studio15\SailPlay\SDK\Api\Purchases\Create\Request\CreatePurchaseRequest;
use Studio15\SailPlay\SDK\Api\Purchases\Create\Response\CreatePurchasesResponse;
use Studio15\SailPlay\SDK\Api\Users\UserNotFoundException;
use Studio15\SailPlay\SDK\Infrastructure\ApiHttpClient;
use Studio15\SailPlay\SDK\Infrastructure\Error\ApiErrorException;
use Throwable;

final class CreatePurchase
{
    private const RESOURCE_PATH = 'purchases/new';

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
    public function __invoke(CreatePurchaseRequest $createPurchaseRequest, string $token): CreatePurchasesResponse
    {
        try {
            $createPurchasesResponse = $this->apiClient->get(
                self::RESOURCE_PATH,
                CreatePurchasesResponse::class,
                $createPurchaseRequest,
                $token
            );
        } catch (ApiErrorException $apiErrorException) {
            throw $this->resolveApiError($apiErrorException);
        }

        return $createPurchasesResponse;
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
