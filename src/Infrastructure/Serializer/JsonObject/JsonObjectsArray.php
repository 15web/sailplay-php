<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Infrastructure\Serializer\JsonObject;

use Webmozart\Assert\Assert;

/**
 * @template T of object
 */
final class JsonObjectsArray
{
    /**
     * @var array<int, T>
     */
    private $objects;

    /**
     * @param array<int, T> $objects
     */
    public function __construct(array $objects)
    {
        Assert::minCount($objects, 1);

        /**
         * @var object $firstObject
         */
        $firstObject = reset($objects);
        Assert::object($firstObject);

        Assert::allIsInstanceOf($objects, \get_class($firstObject));

        $this->objects = $objects;
    }

    /**
     * @return array<int, T>
     */
    public function getObjects(): array
    {
        return $this->objects;
    }
}
