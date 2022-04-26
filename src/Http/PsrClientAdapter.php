<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Http;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Log\LoggerInterface;
use Webmozart\Assert\Assert;

final class PsrClientAdapter implements Client
{
    private const METHOD_GET = 'GET';
    private const METHOD_POST = 'POST';
    private const SUPPORTED_METHODS = [
        self::METHOD_GET,
        self::METHOD_POST,
    ];

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var ServerRequestFactoryInterface
     */
    private $serverRequestFactory;

    /**
     * @var LoggerInterface|null
     */
    private $logger;

    public function __construct(
        ClientInterface $client,
        ServerRequestFactoryInterface $serverRequestFactory,
        ?LoggerInterface $logger = null
    ) {
        $this->client = $client;
        $this->serverRequestFactory = $serverRequestFactory;
        $this->logger = $logger;
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function get(string $resourceUri): ResponseInterface
    {
        Assert::notEmpty($resourceUri);

        return $this->sendRequest(self::METHOD_GET, $resourceUri);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function post(string $resourceUri, ?string $body = null): ResponseInterface
    {
        Assert::notEmpty($resourceUri);
        Assert::nullOrNotEmpty($body);

        return $this->sendRequest(self::METHOD_POST, $resourceUri, $body);
    }

    /**
     * @throws ClientExceptionInterface
     */
    private function sendRequest(string $method, string $resourceUri, ?string $body = null): ResponseInterface
    {
        Assert::inArray($method, self::SUPPORTED_METHODS);
        Assert::notEmpty($resourceUri);
        Assert::nullOrNotEmpty($body);

        $request = $this->serverRequestFactory->createServerRequest($method, $resourceUri, ['body' => $body]);

        try {
            $response = $this->client->sendRequest($request);
        } catch (ClientExceptionInterface $clientException) {
            if ($this->logger !== null) {
                $this->logger->critical($clientException->getMessage());
            }

            throw $clientException;
        }

        return $response;
    }
}
