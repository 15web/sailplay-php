<?php

namespace Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\Add;

use Webmozart\Assert\Assert;

/**
 * @see https://ru.sailplay.dev/reference/purchases-purchase-attributes-add
 */
final class AddRequest
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

    /**
     * Тип значения атрибута. Возможные типы: str, float, text, date, bool
     *
     * @var string
     */
    private $valueType;

    /**
     * Описание атрибута. Используется для хранения служебной информации
     *
     * @var string|null
     */
    private $description;

    public function __construct(
        int $storeDepartmentId,
        string $alias,
        string $valueType,
        ?string $description
    ) {
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::inArray($valueType, ['str', 'float', 'text', 'date', 'bool']);

        $this->storeDepartmentId = $storeDepartmentId;
        $this->alias = $alias;
        $this->valueType = $valueType;
        $this->description = $description;
    }

    public function getStoreDepartmentId(): int
    {
        return $this->storeDepartmentId;
    }

    public function getAlias(): string
    {
        return $this->alias;
    }

    public function getValueType(): string
    {
        return $this->valueType;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
