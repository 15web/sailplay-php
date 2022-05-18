<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Infrastructure\Serializer\YearMonthDay;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Webmozart\Assert\Assert;

final class YearMonthDayNormalizer implements NormalizerInterface
{
    public const DATE_FORMAT = 'Y-m-d';

    /**
     * @param mixed|YearMonthDay<object> $object
     */
    public function normalize($object, ?string $format = null, array $context = []): string // phpcs:ignore SlevomatCodingStandard.Functions.UnusedParameter
    {
        Assert::isInstanceOf($object, YearMonthDay::class);

        return $object->getObject()->format(self::DATE_FORMAT);
    }

    public function supportsNormalization($data, ?string $format = null): bool // phpcs:ignore SlevomatCodingStandard.Functions.UnusedParameter
    {
        return $data instanceof YearMonthDay;
    }
}
