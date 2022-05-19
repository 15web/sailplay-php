<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\Add;

use Webmozart\Assert\Assert;

/**
 * @see https://ru.sailplay.dev/reference/purchases-purchase-attributes-add
 */
final class AddResponse
{
    /**
     * Статус ответа
     *
     * @var string
     */
    private $status;

    /**
     * Наименование атрибута
     *
     * @var string|null
     */
    private $alias;

    /**
     * Дата создания
     *
     * @var \DateTimeImmutable|null
     */
    private $createDate;

    /**
     * Тип значения атрибута. Возможные типы: str, float, text, date, bool
     *
     * @var string|null
     */
    private $valueType;

    /**
     * Описание атрибута. Используется для хранения служебной информации
     *
     * @var string|null
     */
    private $description;

    public function __construct(
        string $status,
        ?string $alias,
        ?\DateTimeImmutable $createDate,
        ?string $valueType,
        ?string $description
    ) {
        Assert::inArray($valueType, Add::VALUE_TYPES);

        $this->status = $status;
        $this->alias = $alias;
        $this->createDate = $createDate;
        $this->valueType = $valueType;
        $this->description = $description;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function getCreateDate(): ?\DateTimeImmutable
    {
        return $this->createDate;
    }

    public function getValueType(): ?string
    {
        return $this->valueType;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
