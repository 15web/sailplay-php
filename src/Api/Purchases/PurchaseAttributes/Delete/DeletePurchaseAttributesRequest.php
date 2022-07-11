<?php

namespace Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\Delete;

use Webmozart\Assert\Assert;

/**
 * @see https://ru.sailplay.dev/reference/purchases-purchase-attributes-delete
 */
final class DeletePurchaseAttributesRequest
{
    /**
     * Идентификатор департамента
     *
     * @var int
     */
    private $storeDepartmentId;

    /**
     * Наименование атрибута
     *
     * @var string
     */
    private $alias;

    public function __construct(
        int $storeDepartmentId,
        string $alias
    ) {
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::notEmpty($alias);

        $this->storeDepartmentId = $storeDepartmentId;
        $this->alias = $alias;
    }

    public function getStoreDepartmentId(): int
    {
        return $this->storeDepartmentId;
    }

    public function getAlias(): string
    {
        return $this->alias;
    }
}
