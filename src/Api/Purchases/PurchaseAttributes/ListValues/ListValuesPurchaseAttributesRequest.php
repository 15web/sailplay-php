<?php

namespace Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\ListValues;

use Webmozart\Assert\Assert;

/**
 * @see https://ru.sailplay.dev/reference/purchases-purchase-attributes-values-list
 */
final class ListValuesPurchaseAttributesRequest
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
     * Номер страницы
     *
     * @var int
     */
    private $page;

    public function __construct(
        int $storeDepartmentId,
        string $attrAlias,
        int $page = 1
    ) {
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::notEmpty($attrAlias);
        Assert::positiveInteger($page);

        $this->storeDepartmentId = $storeDepartmentId;
        $this->attrAlias = $attrAlias;
        $this->page = $page;
    }

    public function getStoreDepartmentId(): int
    {
        return $this->storeDepartmentId;
    }

    public function getAttrAlias(): string
    {
        return $this->attrAlias;
    }

    public function getPage(): int
    {
        return $this->page;
    }
}
