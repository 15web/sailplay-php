<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Promocodes\ListGroups\Response;

final class PromocodesGroup
{
    /**
     * Дата создания
     *
     * @var \DateTimeImmutable|null
     */
    private $createDate;

    /**
     * Количество промокодов доступное для выдачи
     *
     * @var int|null
     */
    private $reservedCount;

    /**
     * Уникальность промокодов
     *
     * @var bool|null
     */
    private $applyItemsOnce;

    /**
     * Количество выданных промокодов
     *
     * @var int|null
     */
    private $receiptedCount;

    /**
     * Количество промокодов примененное к покупке
     *
     * @var int|null
     */
    private $appliedCount;

    /**
     * Количество неиспользованных промокодов
     *
     * @var int|null
     */
    private $unusedCount;

    /**
     * Идентификатор группы
     *
     * @var int|null
     */
    private $id;

    /**
     * Дата обновления
     *
     * @var \DateTimeImmutable|null
     */
    private $updateDate;

    /**
     * Наименование группы
     *
     * @var string|null
     */
    private $name;

    /**
     * Общее количество промокодов
     *
     * @var int|null
     */
    private $totalCount;

    /**
     * Тип группы
     *
     * @var int|null
     */
    private $groupType;

    /**
     * Маркетинговые акции, в условиях которых задействована гурппа промокодов
     *
     * @var MarketingAction[]|null
     */
    private $marketingActions;

    /**
     * @param MarketingAction[]|null $marketingActions
     */
    public function __construct(
        ?\DateTimeImmutable $createDate,
        ?int $reservedCount,
        ?bool $applyItemsOnce,
        ?int $receiptedCount,
        ?int $appliedCount,
        ?int $unusedCount,
        ?int $id,
        ?\DateTimeImmutable $updateDate,
        ?string $name,
        ?int $totalCount,
        ?int $groupType,
        ?array $marketingActions
    ) {
        $this->createDate = $createDate;
        $this->reservedCount = $reservedCount;
        $this->applyItemsOnce = $applyItemsOnce;
        $this->receiptedCount = $receiptedCount;
        $this->appliedCount = $appliedCount;
        $this->unusedCount = $unusedCount;
        $this->id = $id;
        $this->updateDate = $updateDate;
        $this->name = $name;
        $this->totalCount = $totalCount;
        $this->groupType = $groupType;
        $this->marketingActions = $marketingActions;
    }

    public function getCreateDate(): ?\DateTimeImmutable
    {
        return $this->createDate;
    }

    public function getReservedCount(): ?int
    {
        return $this->reservedCount;
    }

    public function getApplyItemsOnce(): ?bool
    {
        return $this->applyItemsOnce;
    }

    public function getReceiptedCount(): ?int
    {
        return $this->receiptedCount;
    }

    public function getAppliedCount(): ?int
    {
        return $this->appliedCount;
    }

    public function getUnusedCount(): ?int
    {
        return $this->unusedCount;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUpdateDate(): ?\DateTimeImmutable
    {
        return $this->updateDate;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getTotalCount(): ?int
    {
        return $this->totalCount;
    }

    public function getGroupType(): ?int
    {
        return $this->groupType;
    }

    /**
     * @return MarketingAction[]|null
     */
    public function getMarketingActions(): ?array
    {
        return $this->marketingActions;
    }
}
