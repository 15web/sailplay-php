<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\MarketingActions\Calc\Light\Response;

final class Rewards
{
    /**
     * Тип
     *
     * @var string|null
     */
    private $type;

    /**
     * Список sku
     *
     * @var string|null
     */
    private $skus;

    /**
     * Лимит по количеству
     *
     * @var int|null
     */
    private $quantityLimit;

    /**
     * Осталось
     *
     * @var int|null
     */
    private $quantityLeft;

    public function __construct(
        ?string $type,
        ?string $skus,
        ?int $quantityLimit,
        ?int $quantityLeft
    ) {
        $this->type = $type;
        $this->skus = $skus;
        $this->quantityLimit = $quantityLimit;
        $this->quantityLeft = $quantityLeft;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getSkus(): ?string
    {
        return $this->skus;
    }

    public function getQuantityLimit(): ?int
    {
        return $this->quantityLimit;
    }

    public function getQuantityLeft(): ?int
    {
        return $this->quantityLeft;
    }
}
