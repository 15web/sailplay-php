<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\Create\Response\Cart;

use Studio15\SailPlay\SDK\Api\Purchases\Create\Response\Cart\Positions\Category;
use Studio15\SailPlay\SDK\Api\Purchases\Create\Response\Cart\Positions\ExpiryInfo;
use Studio15\SailPlay\SDK\Api\Purchases\Create\Response\Cart\Positions\Product;

final class Positions
{
    /**
     * Аттрибуты
     *
     * @var array<mixed>|null
     */
    private $customAttrs;

    /**
     * @var Category|null
     */
    private $category;

    /**
     * @var Product|null
     */
    private $product;

    /**
     * id сотрудника
     *
     * @var int|null
     */
    private $employeeId;

    /**
     * Максимально возможное количество баллов для списания в корзине
     *
     * @var int|null
     */
    private $discountPointsMax;

    /**
     * Обратный коэфициент баллов
     *
     * @var array<mixed>|null
     */
    private $reversePointsRate;

    /**
     * Цена
     *
     * @var string|null
     */
    private $price;

    /**
     * @var ExpiryInfo[]|null
     */
    private $expiryInfo;

    /**
     * Цена со скидкой
     *
     * @var string|null
     */
    private $newPrice;

    /**
     * Минимальная цена
     *
     * @var string|null
     */
    private $minPrice;

    /**
     * Позиция
     *
     * @var int|null
     */
    private $num;

    /**
     * Список акций
     *
     * @var string[]|null
     */
    private $marketingActions;

    /**
     * Количество
     *
     * @var string|null
     */
    private $quantity;

    /**
     * Коэфициент баллов
     *
     * @var string|null
     */
    private $pointsRate;

    /**
     * Скидочные баллы
     *
     * @var int|null
     */
    private $discountPoints;

    /**
     * Количество баллов
     *
     * @var string|null
     */
    private $points;

    /**
     * @param ExpiryInfo[]|null $expiryInfo
     * @param string[]|null $marketingActions
     * @param array<mixed>|null $customAttrs
     * @param array<mixed>|null $reversePointsRate
     */
    public function __construct(
        ?array $customAttrs,
        ?Category $category,
        ?Product $product,
        ?int $employeeId,
        ?int $discountPointsMax,
        ?array $reversePointsRate,
        ?string $price,
        ?array $expiryInfo,
        ?string $newPrice,
        ?string $minPrice,
        ?int $num,
        ?array $marketingActions,
        ?string $quantity,
        ?string $pointsRate,
        ?int $discountPoints,
        ?string $points
    ) {
        $this->customAttrs = $customAttrs;
        $this->category = $category;
        $this->product = $product;
        $this->employeeId = $employeeId;
        $this->discountPointsMax = $discountPointsMax;
        $this->reversePointsRate = $reversePointsRate;
        $this->price = $price;
        $this->expiryInfo = $expiryInfo;
        $this->newPrice = $newPrice;
        $this->minPrice = $minPrice;
        $this->num = $num;
        $this->marketingActions = $marketingActions;
        $this->quantity = $quantity;
        $this->pointsRate = $pointsRate;
        $this->discountPoints = $discountPoints;
        $this->points = $points;
    }

    /**
     * @return array<mixed>|null
     */
    public function getCustomAttrs(): ?array
    {
        return $this->customAttrs;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function getEmployeeId(): ?int
    {
        return $this->employeeId;
    }

    public function getDiscountPointsMax(): ?int
    {
        return $this->discountPointsMax;
    }

    /**
     * @return array<mixed>|null
     */
    public function getReversePointsRate(): ?array
    {
        return $this->reversePointsRate;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    /**
     * @return ExpiryInfo[]|null
     */
    public function getExpiryInfo(): ?array
    {
        return $this->expiryInfo;
    }

    public function getNewPrice(): ?string
    {
        return $this->newPrice;
    }

    public function getMinPrice(): ?string
    {
        return $this->minPrice;
    }

    public function getNum(): ?int
    {
        return $this->num;
    }

    /**
     * @return string[]|null
     */
    public function getMarketingActions(): ?array
    {
        return $this->marketingActions;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function getPointsRate(): ?string
    {
        return $this->pointsRate;
    }

    public function getDiscountPoints(): ?int
    {
        return $this->discountPoints;
    }

    public function getPoints(): ?string
    {
        return $this->points;
    }
}
