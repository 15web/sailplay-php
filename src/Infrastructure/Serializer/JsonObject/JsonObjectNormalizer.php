<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Infrastructure\Serializer\JsonObject;

use InvalidArgumentException;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Webmozart\Assert\Assert;

final class JsonObjectNormalizer implements NormalizerInterface
{
    /**
     * @param JsonObject<object>|JsonObjectsArray<object>|mixed $object
     */
    public function normalize($object, ?string $format = null, array $context = []): string // phpcs:ignore SlevomatCodingStandard.Functions.UnusedParameter
    {
        Assert::isInstanceOfAny($object, [JsonObject::class, JsonObjectsArray::class]);

        $symfonySerializer = new Serializer(
            [new ObjectNormalizer(null, (new CamelCaseToSnakeCaseNameConverter()))],
            [new JsonEncoder()]
        );

        if ($object instanceof JsonObject) {
            return $symfonySerializer->serialize($object->getObject(), JsonEncoder::FORMAT);
        }

        if ($object instanceof JsonObjectsArray) {
            return $symfonySerializer->serialize($object->getObjects(), JsonEncoder::FORMAT);
        }

        throw new InvalidArgumentException();
    }

    public function supportsNormalization($data, ?string $format = null): bool // phpcs:ignore SlevomatCodingStandard.Functions.UnusedParameter
    {
        return $data instanceof JsonObject || $data instanceof JsonObjectsArray;
    }
}
