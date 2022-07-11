<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\Delete;

/**
 * @see https://ru.sailplay.dev/reference/purchases-purchase-attributes-delete
 */
final class DeletePurchaseAttributesResponse
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
