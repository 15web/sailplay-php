<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Login;

use DateInterval;
use Exception;
use Psr\SimpleCache\CacheInterface;
use Psr\SimpleCache\InvalidArgumentException as CacheInvalidArgumentException;
use Studio15\SailPlay\SDK\Infrastructure\ApiHttpClient;
use Studio15\SailPlay\SDK\Infrastructure\Error\ApiErrorException;
use Throwable;

final class Login
{
    private const RESOURCE_PATH = 'login';

    /**
     * @var ApiHttpClient
     */
    private $apiClient;

    /**
     * @var CacheInterface
     */
    private $cache;

    public function __construct(ApiHttpClient $client, CacheInterface $cache)
    {
        $this->apiClient = $client;
        $this->cache = $cache;
    }

    /**
     * @throws CacheInvalidArgumentException
     * @throws Throwable
     */
    public function __invoke(LoginRequest $loginRequest): LoginResponse
    {
        $key = $this->resolveCacheKey($loginRequest);

        /** @var LoginResponse|null $cachedResponse */
        $cachedResponse = $this->cache->get($key);
        if ($cachedResponse !== null) {
            return $cachedResponse;
        }

        try {
            $loginResponse = $this->apiClient->post(self::RESOURCE_PATH, LoginResponse::class, $loginRequest);
        } catch (ApiErrorException $apiErrorException) {
            throw $this->resolveApiError($apiErrorException);
        }

        $this->cache->set($key, $loginResponse, new DateInterval('PT24H'));

        return $loginResponse;
    }

    private function resolveCacheKey(LoginRequest $loginRequest): string
    {
        $credentialsHash = md5(
            $loginRequest->getStoreDepartmentId()
            .$loginRequest->getStoreDepartmentKey()
            .$loginRequest->getPinCode()
        );

        return urlencode(self::class.$credentialsHash);
    }

    private function resolveApiError(ApiErrorException $apiErrorException): Exception
    {
        $code = $apiErrorException->getCode();

        if ($code === -2) {
            return new AuthErrorException($apiErrorException);
        }

        return $apiErrorException;
    }
}
