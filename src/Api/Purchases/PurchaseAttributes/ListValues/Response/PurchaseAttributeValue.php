<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\ListValues\Response;

final class PurchaseAttributeValue
{
    /**
     * Идентификатор значения
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
        ?int $id,
        $value
    ) {
        $this->id = $id;
        $this->value = $value;
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
