<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\Create\Response\Cart;

final class Recommendation
{
    /**
     * Имя
     *
     * @var string|null
     */
    private $name;

    /**
     * Цена
     *
     * @var string|null
     */
    private $price;

    /**
     * SKU
     *
     * @var string|null
     */
    private $sku;

    /**
     * Наименование категории
     *
     * @var string|null
     */
    private $categoryName;

    /**
     * Переменные
     *
     * @var string|null
     */
    private $vars;

    public function __construct(?string $name, ?string $price, ?string $sku, ?string $categoryName, ?string $vars)
    {
        $this->name = $name;
        $this->price = $price;
        $this->sku = $sku;
        $this->categoryName = $categoryName;
        $this->vars = $vars;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    public function getVars(): ?string
    {
        return $this->vars;
    }
}
