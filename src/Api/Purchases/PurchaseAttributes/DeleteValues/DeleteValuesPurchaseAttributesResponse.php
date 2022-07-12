<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\DeleteValues;

/**
 * @see https://ru.sailplay.dev/reference/purchases-purchase-attributes-values-delete
 */
final class DeleteValuesPurchaseAttributesResponse
{
    /**
     * Статус ответа
     *
     * @var string
     */
    private $status;

    public function __construct(string $status)
    {
        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
