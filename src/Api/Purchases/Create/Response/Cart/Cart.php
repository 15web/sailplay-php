<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\Create\Response\Cart;

use Studio15\SailPlay\SDK\Api\Purchases\Create\Response\Cart\ExtraPoints\ExtraPoints;

final class Cart
{
    /**
     * Идентификатор
     *
     * @var int|null
     */
    private $id;

    /**
     * Параметры
     *
     * @var array<mixed>|null
     */
    private $params;

    /**
     * @var Positions[]|null
     */
    private $positions;

    /**
     * Счетчик позиций
     *
     * @var int|null
     */
    private $positionsCount;

    /**
     * Общая цена
     *
     * @var string|null
     */
    private $totalPrice;

    /**
     * Всего баллов
     *
     * @var int|null
     */
    private $totalPoints;

    /**
     * ID родительской корзины
     *
     * @var int|null
     */
    private $parentId;

    /**
     * @var array<mixed>|null
     */
    private $upsaled;

    /**
     * Максимально возможное количество баллов для списания в корзине
     *
     * @var int|null
     */
    private $totalDiscountPointsMax;

    /**
     * Дополнительные баллы
     *
     * @var ExtraPoints|null
     */
    private $extraPoints;

    /**
     * @var TextBlock[]|null
     */
    private $textBlocks;

    /**
     * Максимально возможное количество баллов для списания в корзине с учетом баланса клиента
     *
     * @var int|null
     */
    private $totalDiscountPointsMaxForUser;

    /**
     * @param Positions[]|null $positions
     * @param TextBlock[]|null $textBlocks
     * @param array<mixed>|null $params
     * @param array<mixed>|null $upsaled
     */
    public function __construct(
        ?int $id,
        ?array $params,
        ?array $positions,
        ?int $positionsCount,
        ?string $totalPrice,
        ?int $totalPoints,
        ?int $parentId,
        ?array $upsaled,
        ?int $totalDiscountPointsMax,
        ?ExtraPoints $extraPoints,
        ?array $textBlocks,
        ?int $totalDiscountPointsMaxForUser
    ) {
        $this->id = $id;
        $this->params = $params;
        $this->positions = $positions;
        $this->positionsCount = $positionsCount;
        $this->totalPrice = $totalPrice;
        $this->totalPoints = $totalPoints;
        $this->parentId = $parentId;
        $this->upsaled = $upsaled;
        $this->totalDiscountPointsMax = $totalDiscountPointsMax;
        $this->extraPoints = $extraPoints;
        $this->textBlocks = $textBlocks;
        $this->totalDiscountPointsMaxForUser = $totalDiscountPointsMaxForUser;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return array<mixed>|null
     */
    public function getParams(): ?array
    {
        return $this->params;
    }

    /**
     * @return Positions[]|null
     */
    public function getPositions(): ?array
    {
        return $this->positions;
    }

    public function getPositionsCount(): ?int
    {
        return $this->positionsCount;
    }

    public function getTotalPrice(): ?string
    {
        return $this->totalPrice;
    }

    public function getTotalPoints(): ?int
    {
        return $this->totalPoints;
    }

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    /**
     * @return array<mixed>|null
     */
    public function getUpsaled(): ?array
    {
        return $this->upsaled;
    }

    public function getTotalDiscountPointsMax(): ?int
    {
        return $this->totalDiscountPointsMax;
    }

    public function getExtraPoints(): ?ExtraPoints
    {
        return $this->extraPoints;
    }

    /**
     * @return TextBlock[]|null
     */
    public function getTextBlocks(): ?array
    {
        return $this->textBlocks;
    }

    public function getTotalDiscountPointsMaxForUser(): ?int
    {
        return $this->totalDiscountPointsMaxForUser;
    }
}
