<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Infrastructure\Http\RequestFactory;

use GuzzleHttp\Psr7\ServerRequest;
use GuzzleHttp\Psr7\Uri;
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
     * @param array{queryString: string}|mixed[] $serverParams
     */
    public function createServerRequest(string $method, $uri, array $serverParams = []): ServerRequestInterface
    {
        Assert::inArray($method, self::SUPPORTED_METHODS);

        $preparedUri = $this->prepareUri($uri, $serverParams['queryString'] ?? null);
        $preparedHeaders = $this->prepareHeaders($method);

        return new ServerRequest($method, $preparedUri, $preparedHeaders);
    }

    /**
     * @param string|UriInterface $path
     */
    private function prepareUri($path, ?string $queryString): UriInterface
    {
        $uri = new Uri($this->baseUri);

        if ($path instanceof UriInterface) {
            $path = $path->getPath();
        }

        $path = rtrim($path, '/');
        $path = ltrim($path, '/');
        $path = sprintf('/%s/', $path);

        $uri = $uri->withPath($uri->getPath().$path);

        if ($queryString !== null) {
            $queryString = rtrim($queryString, '/');
            $queryString = ltrim($queryString, '/');
            $uri = $uri->withQuery($queryString);
        }

        return $uri;
    }

    /**
     * @return array<string, string>
     */
    private function prepareHeaders(string $method): array
    {
        Assert::inArray($method, self::SUPPORTED_METHODS);

        $headers = ['Accept' => 'application/json'];

        if ($method === self::METHOD_POST) {
            $headers['Content-Type'] = 'x-www-form-urlencoded';
        }

        return $headers;
    }
}
