<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Http;

use Psr\Http\Message\ResponseInterface;

interface Client
{
    public function get(string $resourceUri): ResponseInterface;

    public function post(string $resourceUri, ?string $body = null): ResponseInterface;
}
