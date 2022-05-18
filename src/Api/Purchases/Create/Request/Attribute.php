<?php

namespace Studio15\SailPlay\SDK\Api\Purchases\Create\Request;

use Studio15\SailPlay\SDK\Infrastructure\Serializer\JsonObjectsAssociativeArray\JsonObjectsAssociativeArrayItemInterface;

final class Attribute implements JsonObjectsAssociativeArrayItemInterface
{
    /**
     * @var string
     */
    private $alias;

    /**
     * @var mixed
     */
    private $value;

    /**
     * @param mixed $value
     */
    public function __construct(string $alias, $value)
    {
        $this->alias = $alias;
        $this->value = $value;
    }

    public function getKey(): string
    {
        return $this->alias;
    }

    public function getValue()
    {
        return $this->value;
    }
}
