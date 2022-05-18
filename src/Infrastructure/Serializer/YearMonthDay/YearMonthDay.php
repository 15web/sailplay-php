<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Infrastructure\Serializer\YearMonthDay;

/**
 * @template T of object
 */
final class YearMonthDay
{
    /**
     * @var T
     */
    private $object;

    /**
     * @param T $object
     */
    public function __construct(object $object)
    {
        $this->object = $object;
    }

    /**
     * @return T
     */
    public function getObject(): object
    {
        return $this->object;
    }
}
