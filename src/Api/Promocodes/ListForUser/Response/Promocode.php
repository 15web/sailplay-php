<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Promocodes\ListForUser\Response;

final class Promocode
{
    /**
     * @var IssuedTo|null
     */
    private $issuedTo;

    /**
     * Идентификатор покупки
     *
     * @var int|null
     */
    private $purchaseId;

    /**
     * Дата выдачи
     *
     * @var \DateTimeImmutable|null
     */
    private $receiptDate;

    /**
     * Номер
     *
     * @var string|null
     */
    private $number;

    /**
     * @var Group|null
     */
    private $group;

    /**
     * @var IssuedBy|null
     */
    private $issuedBy;

    /**
     * Дата использования
     *
     * @var \DateTimeImmutable|null
     */
    private $dateOfUse;

    /**
     * Номер заказа
     *
     * @var string|null
     */
    private $orderNum;

    /**
     * @var MarketingAction[]|null
     */
    private $marketingAction;

    /**
     * @var PossibleMarketingAction[]|null
     */
    private $possibleMarketingAction;

    /**
     * @param MarketingAction[]|null $marketingAction
     * @param PossibleMarketingAction[]|null $possibleMarketingAction
     */
    public function __construct(
        ?IssuedTo $issuedTo,
        ?int $purchaseId,
        ?\DateTimeImmutable $receiptDate,
        ?string $number,
        ?Group $group,
        ?IssuedBy $issuedBy,
        ?\DateTimeImmutable $dateOfUse,
        ?string $orderNum,
        ?array $marketingAction,
        ?array $possibleMarketingAction
    ) {
        $this->issuedTo = $issuedTo;
        $this->purchaseId = $purchaseId;
        $this->receiptDate = $receiptDate;
        $this->number = $number;
        $this->group = $group;
        $this->issuedBy = $issuedBy;
        $this->dateOfUse = $dateOfUse;
        $this->orderNum = $orderNum;
        $this->marketingAction = $marketingAction;
        $this->possibleMarketingAction = $possibleMarketingAction;
    }

    public function getIssuedTo(): ?IssuedTo
    {
        return $this->issuedTo;
    }

    public function getPurchaseId(): ?int
    {
        return $this->purchaseId;
    }

    public function getReceiptDate(): ?\DateTimeImmutable
    {
        return $this->receiptDate;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function getGroup(): ?Group
    {
        return $this->group;
    }

    public function getIssuedBy(): ?IssuedBy
    {
        return $this->issuedBy;
    }

    public function getDateOfUse(): ?\DateTimeImmutable
    {
        return $this->dateOfUse;
    }

    public function getOrderNum(): ?string
    {
        return $this->orderNum;
    }

    /**
     * @return MarketingAction[]|null
     */
    public function getMarketingAction(): ?array
    {
        return $this->marketingAction;
    }

    /**
     * @return PossibleMarketingAction[]|null
     */
    public function getPossibleMarketingAction(): ?array
    {
        return $this->possibleMarketingAction;
    }
}
