<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\AddValues;

/**
 * @see https://ru.sailplay.dev/reference/purchases-purchase-attributes-values-add
 */
final class AddValuesPurchaseAttributesResponse
{
    /**
     * Статус ответа
     *
     * @var string
     */
    private $status;

    /**
     * Идентификатор созданного значения атрибута
     *
     * @var int|null
     */
    private $id;

    /**
     * Значение атрибута
     *
     * @var mixed
     */
    private $value;

    /**
     * @param mixed $value
     */
    public function __construct(
        string $status,
        ?int $id,
        $value
    ) {
        $this->status = $status;
        $this->id = $id;
        $this->value = $value;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
