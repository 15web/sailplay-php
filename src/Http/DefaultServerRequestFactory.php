<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Http;

use GuzzleHttp\Psr7\ServerRequest;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UriInterface;
use Webmozart\Assert\Assert;

final class DefaultServerRequestFactory implements ServerRequestFactoryInterface
{
    private const METHOD_GET = 'GET';
    private const METHOD_POST = 'POST';
    private const SUPPORTED_METHODS = [
        self::METHOD_GET,
        self::METHOD_POST,
    ];

    /**
     * @var string
     */
    private $baseUri;

    public function __construct(string $baseUri = 'https://sailplay.ru/api/v2')
    {
        Assert::notEmpty($baseUri);

        $this->baseUri = rtrim($baseUri, '/');
    }

    /**
     * {@inheritDoc}
     *
     * @param array{body: string}|mixed[] $serverParams
     */
    public function createServerRequest(string $method, $uri, array $serverParams = []): ServerRequestInterface
    {
        Assert::inArray($method, self::SUPPORTED_METHODS);
        Assert::notEmpty($uri);

        $preparedUri = $this->prepareUri($uri);
        $preparedHeaders = $this->prepareHeaders($method);

        return new ServerRequest($method, $preparedUri, $preparedHeaders, $serverParams['body'] ?? null);
    }

    /**
     * @param string|UriInterface $uri
     */
    private function prepareUri($uri): string
    {
        Assert::notEmpty($uri);

        $uri = (string) $uri;

        $uri = rtrim($uri, '/');
        $uri = ltrim($uri, '/');

        // trailing slash required due to errors
        return sprintf('%s/%s/', $this->baseUri, $uri);
    }

    /**
     * @return array<string, string>
     */
    private function prepareHeaders(string $method): array
    {
        Assert::inArray($method, self::SUPPORTED_METHODS);

        $headers = [];
        if ($method === self::METHOD_POST) {
            $headers['Content-Type'] = 'x-www-form-urlencoded';
        }

        return $headers;
    }
}
