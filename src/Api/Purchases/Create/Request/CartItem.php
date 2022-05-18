<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\Create\Request;

use Webmozart\Assert\Assert;

final class CartItem
{
    /**
     * ID товара в вашей системе (артикул
     *
     * @var string
     */
    private $sku;

    /**
     * Суммарная стоимость позиции
     *
     * @var int
     */
    private $price;

    /**
     * Количество единиц товара в позиции чека.
     *
     * @var int
     */
    private $quantity;

    /**
     * Минимальная стоимость товара по которой товар может быть продан.
     * Акции не могут снизить стоимость товара ниже min_price. Необязательный параметр.
     *
     * @var int|null
     */
    private $minPrice;

    public function __construct(
        string $sku,
        int $price,
        int $quantity,
        ?int $minPrice = null
    ) {
        Assert::notEmpty($sku);
        Assert::greaterThan($price, 0);
        Assert::greaterThan($quantity, 0);
        Assert::nullOrGreaterThan($minPrice, 0);
        Assert::nullOrGreaterThanEq($price, $minPrice);

        $this->sku = $sku;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->minPrice = $minPrice;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getMinPrice(): ?int
    {
        return $this->minPrice;
    }
}
