<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Infrastructure\Serializer\JsonObjectsAssociativeArray;

interface JsonObjectsAssociativeArrayItemInterface
{
    public function getKey(): string;

    /**
     * @return mixed
     */
    public function getValue();
}
