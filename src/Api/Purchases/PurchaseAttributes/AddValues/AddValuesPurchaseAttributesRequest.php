<?php

namespace Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\AddValues;

use Webmozart\Assert\Assert;

/**
 * @see https://ru.sailplay.dev/reference/purchases-purchase-attributes-values-add
 */
final class AddValuesPurchaseAttributesRequest
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
    private $attrAlias;

    /**
     * Значения атрибута
     *
     * @var mixed
     */
    private $value;

    /**
     * @param mixed $value
     */
    public function __construct(
        int $storeDepartmentId,
        string $attrAlias,
        $value
    ) {
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::notEmpty($attrAlias);

        $this->storeDepartmentId = $storeDepartmentId;
        $this->attrAlias = $attrAlias;
        $this->value = $value;
    }

    public function getStoreDepartmentId(): int
    {
        return $this->storeDepartmentId;
    }

    public function getAttrAlias(): string
    {
        return $this->attrAlias;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
