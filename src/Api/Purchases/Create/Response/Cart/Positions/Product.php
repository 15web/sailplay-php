<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\Create\Response\Cart\Positions;

final class Product
{
    /**
     * SKU
     *
     * @var string|null
     */
    private $sku;

    /**
     * ID
     *
     * @var int|null
     */
    private $id;

    /**
     * Имя
     *
     * @var string|null
     */
    private $name;

    public function __construct(?string $sku, ?int $id, ?string $name = null)
    {
        $this->sku = $sku;
        $this->id = $id;
        $this->name = $name;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
