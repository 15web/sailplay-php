<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\MarketingActions\Calc\Light\Response;

final class Recommendation
{
    /**
     * Имя
     *
     * @var ?string
     */
    private $name;

    /**
     * Цена
     *
     * @var ?string
     */
    private $price;

    /**
     * SKU
     *
     * @var ?string
     */
    private $sku;

    /**
     * Наименование категории
     *
     * @var ?string
     */
    private $categoryName;

    /**
     * Переменные
     *
     * @var ?string
     */
    private $vars;

    public function __construct(
        ?string $name,
        ?string $price,
        ?string $sku,
        ?string $categoryName,
        ?string $vars
    ) {
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
