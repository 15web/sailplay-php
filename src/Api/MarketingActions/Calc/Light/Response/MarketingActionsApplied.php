<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\MarketingActions\Calc\Light\Response;

final class MarketingActionsApplied
{
    /**
     * Alias
     *
     * @var string|null
     */
    private $alias;

    /**
     * Имя
     *
     * @var string|null
     */
    private $name;

    /**
     * Сервисное сообщение
     *
     * @var string|null
     */
    private $serviceMsg;

    /**
     * Клиентское сообщение
     *
     * @var string|null
     */
    private $clientMsg;

    /**
     * Вознаграждение
     *
     * @var Rewards|null
     */
    private $rewards;

    /**
     * Всего принято
     *
     * @var int|null
     */
    private $totalQuantityApplied;

    /**
     * Количество
     *
     * @var int|null
     */
    private $count;

    /**
     * Общая скидка
     *
     * @var int|null
     */
    private $totalDiscount;

    /**
     * Действует до
     *
     * @var string|null
     */
    private $tillDate;

    public function __construct(
        ?string $alias,
        ?string $name,
        ?string $serviceMsg,
        ?string $clientMsg,
        ?Rewards $rewards,
        ?int $totalQuantityApplied,
        ?int $count,
        ?int $totalDiscount,
        ?string $tillDate
    ) {
        $this->alias = $alias;
        $this->name = $name;
        $this->serviceMsg = $serviceMsg;
        $this->clientMsg = $clientMsg;
        $this->rewards = $rewards;
        $this->totalQuantityApplied = $totalQuantityApplied;
        $this->count = $count;
        $this->totalDiscount = $totalDiscount;
        $this->tillDate = $tillDate;
    }

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getServiceMsg(): ?string
    {
        return $this->serviceMsg;
    }

    public function getClientMsg(): ?string
    {
        return $this->clientMsg;
    }

    public function getRewards(): ?Rewards
    {
        return $this->rewards;
    }

    public function getTotalQuantityApplied(): ?int
    {
        return $this->totalQuantityApplied;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function getTotalDiscount(): ?int
    {
        return $this->totalDiscount;
    }

    public function getTillDate(): ?string
    {
        return $this->tillDate;
    }
}
