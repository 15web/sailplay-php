<?php

namespace Studio15\SailPlay\SDK\Api\Promocodes\ListGroups;

use Webmozart\Assert\Assert;

/**
 * @see https://ru.sailplay.dev/reference/promocodes-groups-list
 */
final class ListPromocodesGroupsRequest
{
    /**
     * Идентификатор департамента
     *
     * @var int
     */
    private $storeDepartmentId;

    public function __construct(int $storeDepartmentId)
    {
        Assert::greaterThan($storeDepartmentId, 0);

        $this->storeDepartmentId = $storeDepartmentId;
    }

    public function getStoreDepartmentId(): int
    {
        return $this->storeDepartmentId;
    }
}
