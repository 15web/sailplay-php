<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\ListAll\Response;

/**
 * @see https://ru.sailplay.dev/reference/purchases-purchase-attributes-list
 */
final class ListPurchaseAttributesResponse
{
    /**
     * Статус ответа
     *
     * @var string
     */
    private $status;

    /**
     * @var Attribute[]
     */
    private $attributes;

    /**
     * @param Attribute[] $attributes
     */
    public function __construct(
        string $status,
        array $attributes
    ) {
        $this->status = $status;
        $this->attributes = $attributes;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return Attribute[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }
}
