<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Infrastructure\Serializer;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Webmozart\Assert\Assert;

final class StringsArrayNormalizer implements NormalizerInterface
{
    /**
     * @param mixed|string[] $object
     */
    public function normalize($object, ?string $format = null, array $context = []): string // phpcs:ignore SlevomatCodingStandard.Functions.UnusedParameter
    {
        Assert::allString($object);

        $formattedStrings = [];
        foreach ($object as $string) {
            $formattedStrings[] = '"'.$string.'"';
        }

        $normalizedStrings = implode(',', $formattedStrings);

        return "[{$normalizedStrings}]";
    }

    public function supportsNormalization($data, ?string $format = null): bool // phpcs:ignore SlevomatCodingStandard.Functions.UnusedParameter
    {
        $allStringReducer = static function (bool $carry, $item) {
            return $carry && \is_string($item);
        };

        return \is_array($data) && array_reduce($data, $allStringReducer, true);
    }
}
