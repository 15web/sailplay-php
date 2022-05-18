<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Infrastructure\Serializer\JsonObjectsAssociativeArray;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Webmozart\Assert\Assert;

final class JsonObjectsAssociativeArrayNormalizer implements NormalizerInterface
{
    /**
     * @param JsonObjectsAssociativeArray<object>|mixed $object
     */
    public function normalize($object, ?string $format = null, array $context = []): string // phpcs:ignore SlevomatCodingStandard.Functions.UnusedParameter
    {
        Assert::isInstanceOf($object, JsonObjectsAssociativeArray::class);

        $symfonySerializer = new Serializer(
            [new ObjectNormalizer(null, (new CamelCaseToSnakeCaseNameConverter()))],
            [new JsonEncoder()]
        );

        return $symfonySerializer->serialize($object->getAssociativeArray(), JsonEncoder::FORMAT);
    }

    public function supportsNormalization($data, ?string $format = null): bool // phpcs:ignore SlevomatCodingStandard.Functions.UnusedParameter
    {
        return $data instanceof JsonObjectsAssociativeArray;
    }
}
