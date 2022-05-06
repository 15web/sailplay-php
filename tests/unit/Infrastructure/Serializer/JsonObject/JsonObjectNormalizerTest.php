<?php

namespace Studio15\SailPlay\SDK\Test\Unit\Infrastructure\Serializer\JsonObject;

use Studio15\SailPlay\SDK\Infrastructure\Serializer\JsonObject\JsonObjectNormalizer;
use PHPUnit\Framework\TestCase;
use Studio15\SailPlay\SDK\Infrastructure\Serializer\JsonObject\JsonObject;
use Studio15\SailPlay\SDK\Infrastructure\Serializer\JsonObject\JsonObjectsArray;

class JsonObjectNormalizerTest extends TestCase
{
    public function testSupportsNormalization()
    {
        $jsonObjectNormalizer = new JsonObjectNormalizer();

        $jsonObject = new JsonObject(new Inner());
        $this->assertTrue($jsonObjectNormalizer->supportsNormalization($jsonObject));

        $jsonObjectsArray = new JsonObjectsArray([new Inner(), new Inner(), new Inner()]);
        $this->assertTrue($jsonObjectNormalizer->supportsNormalization($jsonObjectsArray));
    }

    public function testNormalize()
    {
        $jsonObjectNormalizer = new JsonObjectNormalizer();

        $jsonObject = new JsonObject(new Inner());
        $normalizedJsonObject = $jsonObjectNormalizer->normalize($jsonObject);
        $this->assertEquals('{"x":1}', $normalizedJsonObject);

        $jsonObjectsArray = new JsonObjectsArray([new Inner(), new Inner(), new Inner()]);
        $normalizedJsonObjectsArray = $jsonObjectNormalizer->normalize($jsonObjectsArray);
        $this->assertEquals('[{"x":1},{"x":1},{"x":1}]', $normalizedJsonObjectsArray);
    }
}
