<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Infrastructure;

use GuzzleHttp\Client;
use Studio15\SailPlay\SDK\Infrastructure\Http\RequestFactory\DefaultServerRequestFactory;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

final class DefaultApiHttpClientFactory
{
    public static function create(): DefaultApiHttpClient
    {
        $symfonySerializer = new Serializer(
            [new ObjectNormalizer(null, (new CamelCaseToSnakeCaseNameConverter()))],
            [new JsonEncoder()]
        );

        return new DefaultApiHttpClient(
            new Client(),
            new DefaultServerRequestFactory(),
            $symfonySerializer
        );
    }
}
