<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Infrastructure;

use Studio15\SailPlay\SDK\Infrastructure\Error\ApiErrorException;
use Throwable;

interface ApiHttpClient
{
    /**
     * @template T of object
     *
     * @param class-string<T> $responseClass
     *
     * @throws ApiErrorException
     * @throws Throwable
     *
     * @return T
     */
    public function get(
        string $resourcePath,
        string $responseClass,
        ?object $request = null,
        ?string $token = null
    ): object;

    /**
     * @template T of object
     *
     * @param class-string<T> $responseClass
     *
     * @throws ApiErrorException
     * @throws Throwable
     *
     * @return T
     */
    public function post(
        string $resourcePath,
        string $responseClass,
        ?object $request = null,
        ?string $token = null
    ): object;
}
