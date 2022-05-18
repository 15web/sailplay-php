<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\Create\Response;

/**
 * @see https://ru.sailplay.dev/reference/purchases-new
 */
final class CreatePurchasesResponse
{
    /**
     * Статус ответа
     *
     * @var string
     */
    private $status;

    /**
     * Информация о баллах
     *
     * @var Purchase|null
     */
    private $purchase;

    /**
     * Информация о баллах
     *
     * @var Cart|null
     */
    private $cart;

    public function __construct(
        string $status,
        ?Purchase $purchase,
        ?Cart $cart
    ) {
        $this->status = $status;
        $this->purchase = $purchase;
        $this->cart = $cart;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getPurchase(): ?Purchase
    {
        return $this->purchase;
    }

    public function getCart(): ?Cart
    {
        return $this->cart;
    }
}
