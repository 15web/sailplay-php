<?php

namespace Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\DeleteValues;

use Webmozart\Assert\Assert;

/**
 * @see https://ru.sailplay.dev/reference/purchases-purchase-attributes-values-delete
 */
final class DeleteValuesPurchaseAttributesRequest
{
    /**
     * Идентификатор департамента
     *
     * @var int
     */
    private $storeDepartmentId;

    /**
     * Идентификатор значения
     *
     * @var int
     */
    private $id;

    public function __construct(
        int $storeDepartmentId,
        int $id
    ) {
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::positiveInteger($id);

        $this->storeDepartmentId = $storeDepartmentId;
        $this->id = $id;
    }

    public function getStoreDepartmentId(): int
    {
        return $this->storeDepartmentId;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
