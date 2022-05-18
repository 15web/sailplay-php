<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Infrastructure;

use Psr\Http\Client\ClientExceptionInterface as ClientException;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Log\LoggerInterface;
use Studio15\SailPlay\SDK\Infrastructure\Error\ApiErrorException;
use Studio15\SailPlay\SDK\Infrastructure\Serializer\JsonObject\JsonObjectNormalizer;
use Studio15\SailPlay\SDK\Infrastructure\Serializer\JsonObjectsAssociativeArray\JsonObjectsAssociativeArrayNormalizer;
use Studio15\SailPlay\SDK\Infrastructure\Serializer\StringsArrayNormalizer;
use Studio15\SailPlay\SDK\Infrastructure\Serializer\YearMonthDay\YearMonthDayNormalizer;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\ExceptionInterface as SerializerException;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Throwable;
use Webmozart\Assert\Assert;

final class DefaultApiHttpClient implements ApiHttpClient
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
     * @var Serializer
     */
    private $serializer;

    /**
     * @var LoggerInterface|null
     */
    private $logger;

    public function __construct(
        ClientInterface $client,
        ServerRequestFactoryInterface $serverRequestFactory,
        ?LoggerInterface $logger = null
    ) {
        $this->logger = $logger;
        $this->client = $client;
        $this->serverRequestFactory = $serverRequestFactory;

        $reflectionExtractor = new ReflectionExtractor();
        $phpDocExtractor = new PhpDocExtractor();
        $propertyTypeExtractor = new PropertyInfoExtractor([$reflectionExtractor], [$phpDocExtractor, $reflectionExtractor], [$phpDocExtractor], [$reflectionExtractor], [$reflectionExtractor]);

        $this->serializer = new Serializer(
            [
                new StringsArrayNormalizer(),
                new JsonObjectNormalizer(),
                new JsonObjectsAssociativeArrayNormalizer(),
                new ArrayDenormalizer(),
                new DateTimeNormalizer(),
                new YearMonthDayNormalizer(),
                new ObjectNormalizer(null, (new CamelCaseToSnakeCaseNameConverter()), null, $propertyTypeExtractor),
            ],
            [new JsonEncoder()]
        );
    }

    /**
     * @throws ApiErrorException
     * @throws ClientException
     * @throws SerializerException
     * @throws Throwable
     */
    public function get(
        string $resourcePath,
        string $responseClass,
        ?object $request = null,
        ?string $token = null
    ): object {
        Assert::notEmpty($resourcePath);
        Assert::classExists($responseClass);

        return $this->doRequest(self::METHOD_GET, $resourcePath, $responseClass, $request, $token);
    }

    /**
     * @throws ApiErrorException
     * @throws ClientException
     * @throws SerializerException
     * @throws Throwable
     */
    public function post(
        string $resourcePath,
        string $responseClass,
        ?object $request = null,
        ?string $token = null
    ): object {
        Assert::notEmpty($resourcePath);
        Assert::classExists($responseClass);

        return $this->doRequest(self::METHOD_POST, $resourcePath, $responseClass, $request, $token);
    }

    /**
     * @template T of object
     *
     * @param class-string<T> $responseClass
     *
     * @throws ApiErrorException
     * @throws ClientException
     * @throws SerializerException
     * @throws Throwable
     *
     * @return T
     */
    private function doRequest(string $method, string $resourcePath, string $responseClass, ?object $request, ?string $token = null): object
    {
        Assert::inArray($method, self::SUPPORTED_METHODS);
        Assert::notEmpty($resourcePath);
        Assert::classExists($responseClass);

        $queryString = null;
        if ($request !== null) {
            /**
             * @var array<string, string> $normalizedRequest
             */
            $normalizedRequest = $this->serializer->normalize($request);

            if ($token !== null) {
                $normalizedRequest['token'] = $token;
            }

            $queryString = http_build_query($normalizedRequest);
        }

        try {
            $request = $this->serverRequestFactory->createServerRequest($method, $resourcePath, ['queryString' => $queryString]);

            $responseContents = $this->client->sendRequest($request)
                ->getBody()
                ->getContents();
        } catch (Throwable $exception) {
            $this->logCritical($exception->getMessage());

            throw $exception;
        }

        $decodedResponse = $this->serializer->decode($responseContents, 'json');
        if (!isset($decodedResponse['status']) || $decodedResponse['status'] === 'error') {
            $statusCode = $decodedResponse['status_code'] ?? null;
            $message = $decodedResponse['message'] ?? null;

            $this->logCritical($message);

            throw new ApiErrorException($message, $statusCode);
        }

        return $this->serializer->deserialize($responseContents, $responseClass, 'json');
    }

    private function logCritical(string $message): void
    {
        if ($this->logger !== null) {
            $this->logger->critical($message);
        }
    }
}
