<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\MarketingActions\Calc\Light\Response\Cart;

use Studio15\SailPlay\SDK\Api\MarketingActions\Calc\Light\Response\Cart\ExtraPoints\ExtraPoints;
use Studio15\SailPlay\SDK\Api\MarketingActions\Calc\Light\Response\Cart\Position\Position;
use Studio15\SailPlay\SDK\Api\MarketingActions\Calc\Light\Response\Cart\TextBlock\TextBlock;

/**
 * @see https://ru.sailplay.dev/reference/marketing-actions-calc-light
 */
final class Cart
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var Position[]|null
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
     * @var string[]|null
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
     * @param Position[]|null $positions
     * @param string[] $upsaled
     * @param TextBlock[]|null $textBlocks
     */
    public function __construct(
        ?int $id,
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
     * @return Position[]|null
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
     * @return string[]|null
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
