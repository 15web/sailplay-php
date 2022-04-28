<?php

namespace Studio15\SailPlay\SDK\Api\Users\Info;

/**
 * @see https://ru.sailplay.dev/reference/users-info
 */
final class InfoRequest
{
    /**
     * Идентификатор департамента
     *
     * @var int
     */
    private $storeDepartmentId;

    public function __construct(
        int $storeDepartmentId
    ) {
        $this->storeDepartmentId = $storeDepartmentId;
    }

    public function getStoreDepartmentId(): int
    {
        return $this->storeDepartmentId;
    }
}
