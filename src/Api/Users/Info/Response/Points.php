<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Users\Info\Response;

final class Points
{
    /**
     * Общее количество баллов
     *
     * @var int|null
     */
    private $total;

    /**
     * Потраченное количество баллов
     *
     * @var int|null
     */
    private $spent;

    /**
     * Подтвержденные баллы
     *
     * @var int|null
     */
    private $confirmed;

    /**
     * Списано баллов
     *
     * @var int|null
     */
    private $spentExtra;

    /**
     * Неподтвержденные баллы
     *
     * @var int|null
     */
    private $unconfirmed;

    public function __construct(
        ?int $total,
        ?int $spent,
        ?int $confirmed,
        ?int $spentExtra,
        ?int $unconfirmed
    ) {
        $this->total = $total;
        $this->spent = $spent;
        $this->confirmed = $confirmed;
        $this->spentExtra = $spentExtra;
        $this->unconfirmed = $unconfirmed;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function getSpent(): ?int
    {
        return $this->spent;
    }

    public function getConfirmed(): ?int
    {
        return $this->confirmed;
    }

    public function getSpentExtra(): ?int
    {
        return $this->spentExtra;
    }

    public function getUnconfirmed(): ?int
    {
        return $this->unconfirmed;
    }
}
