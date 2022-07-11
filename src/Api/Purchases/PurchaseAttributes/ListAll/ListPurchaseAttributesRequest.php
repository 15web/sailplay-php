<?php

namespace Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\ListAll;

use Webmozart\Assert\Assert;

/**
 * @see https://ru.sailplay.dev/reference/purchases-purchase-attributes-list
 */
final class ListPurchaseAttributesRequest
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
