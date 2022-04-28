<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Infrastructure;

interface ApiHttpClient
{
    /**
     * @template T of object
     *
     * @param class-string<T> $responseClass
     *
     * @return T
     */
    public function get(string $resourcePath, string $responseClass, ?object $request): object;

    /**
     * @template T of object
     *
     * @param class-string<T> $responseClass
     *
     * @return T
     */
    public function post(string $resourcePath, string $responseClass, ?object $request): object;
}
