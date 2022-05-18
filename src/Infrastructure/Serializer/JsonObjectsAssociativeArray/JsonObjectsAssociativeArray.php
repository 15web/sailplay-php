<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Infrastructure\Serializer\JsonObjectsAssociativeArray;

use Webmozart\Assert\Assert;

/**
 * @template T of JsonObjectsAssociativeArrayItemInterface
 */
final class JsonObjectsAssociativeArray
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

        Assert::allIsInstanceOf($objects, JsonObjectsAssociativeArrayItemInterface::class);

        $this->objects = $objects;
    }

    /**
     * @return array<string, mixed>
     */
    public function getAssociativeArray(): array
    {
        $data = [];
        foreach ($this->objects as $object) {
            $data[$object->getKey()] = $object->getValue();
        }

        return $data;
    }
}
