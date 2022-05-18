<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\Create\Response\Cart\Positions;

final class ExpiryInfo
{
    /**
     * Допустимое количество
     *
     * @var int|null
     */
    private $eligibleQuantity;

    /**
     * Приемлемая ставка баллов
     *
     * @var int|null
     */
    private $eligiblePointsRate;

    /**
     * Дата истечения срока действия
     *
     * @var \DateTimeImmutable|null
     */
    private $expireDate;

    /**
     * Идентификатор бандла
     *
     * @var int|null
     */
    private $bundleId;

    /**
     * Истекающие баллы
     *
     * @var string|null
     */
    private $expiringPoints;

    public function __construct(
        ?int $eligibleQuantity,
        ?int $eligiblePointsRate,
        ?\DateTimeImmutable $expireDate,
        ?int $bundleId,
        ?string $expiringPoints
    ) {
        $this->eligibleQuantity = $eligibleQuantity;
        $this->eligiblePointsRate = $eligiblePointsRate;
        $this->expireDate = $expireDate;
        $this->bundleId = $bundleId;
        $this->expiringPoints = $expiringPoints;
    }

    public function getEligibleQuantity(): ?int
    {
        return $this->eligibleQuantity;
    }

    public function getEligiblePointsRate(): ?int
    {
        return $this->eligiblePointsRate;
    }

    public function getExpireDate(): ?\DateTimeImmutable
    {
        return $this->expireDate;
    }

    public function getBundleId(): ?int
    {
        return $this->bundleId;
    }

    public function getExpiringPoints(): ?string
    {
        return $this->expiringPoints;
    }
}
