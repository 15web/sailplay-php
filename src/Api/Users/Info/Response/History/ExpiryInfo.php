<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Users\Info\Response\History;

final class ExpiryInfo
{
    /**
     * @var int|null
     */
    private $pointsExpirableRemain;

    /**
     * @var \DateTimeImmutable|null
     */
    private $expireDate;

    public function __construct(
        ?int $pointsExpirableRemain,
        ?\DateTimeImmutable $expireDate
    ) {
        $this->pointsExpirableRemain = $pointsExpirableRemain;
        $this->expireDate = $expireDate;
    }

    public function getPointsExpirableRemain(): ?int
    {
        return $this->pointsExpirableRemain;
    }

    public function getExpireDate(): ?\DateTimeImmutable
    {
        return $this->expireDate;
    }
}
