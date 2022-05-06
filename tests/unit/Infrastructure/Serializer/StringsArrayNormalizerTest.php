<?php

namespace Studio15\SailPlay\SDK\Test\Unit\Infrastructure\Serializer;

use Studio15\SailPlay\SDK\Infrastructure\Serializer\StringsArrayNormalizer;
use PHPUnit\Framework\TestCase;

class StringsArrayNormalizerTest extends TestCase
{
    public function testSupportsNormalization(): void
    {
        $stringsArrayNormalizer = new StringsArrayNormalizer();

        $stringsOnly = ['a', 'b', 'c'];
        $this->assertTrue($stringsArrayNormalizer->supportsNormalization($stringsOnly));

        $integersOnly = [1, 2, 3];
        $this->assertFalse($stringsArrayNormalizer->supportsNormalization($integersOnly));

        $mixed = ['a', 'b', 'c', 1];
        $this->assertFalse($stringsArrayNormalizer->supportsNormalization($mixed));

        $notArray = 'im not array';
        $this->assertFalse($stringsArrayNormalizer->supportsNormalization($notArray));
    }

    public function testNormalize(): void
    {
        $stringsArrayNormalizer = new StringsArrayNormalizer();

        $normalized = $stringsArrayNormalizer->normalize(['promo1', 'promo2', 'promo3']);

        $this->assertEquals('["promo1","promo2","promo3"]', $normalized);
    }
}
