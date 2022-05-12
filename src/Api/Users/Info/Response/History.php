<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Users\Info\Response;

use Studio15\SailPlay\SDK\Api\Users\Info\Response\History\ExpiryInfo;

final class History
{
    /**
     * Тип транзакции
     *
     * @var string|null
     */
    private $action;

    /**
     * Дата начисления
     *
     * @var \DateTimeImmutable|null
     */
    private $actionDate;

    /**
     * Статус состояния баллов
     *
     * @var bool|null
     */
    private $isCompleted;

    /**
     * Величина транзакции в баллах
     *
     * @var int|null
     */
    private $pointsDelta;

    /**
     * Комментарий транзакции
     *
     * @var string|null
     */
    private $name;

    /**
     * @var ExpiryInfo[]
     */
    private $expiryInfo;

    /**
     * Изображение подарка
     *
     * @var string|null
     */
    private $pic;

    /**
     * Номер купона, связанный с подарком
     *
     * @var string|null
     */
    private $couponNumber;

    /**
     * Номер покупки
     *
     * @var string|null
     */
    private $orderNum;

    /**
     * Величина транзакции в баллах списания
     *
     * @var string|null
     */
    private $debitedPointsDelta;

    /**
     * Id отдела покупки
     *
     * @var int|null
     */
    private $storeDepartmentId;

    /**
     * Сумма покупки
     *
     * @var int|null
     */
    private $price;

    /**
     * Id покупки
     *
     * @var int|null
     */
    private $id;

    /**
     * user_id получателя или передающего
     *
     * @var int|null
     */
    private $userId;

    /**
     * Имя получатели или отправителя
     *
     * @var string|null
     */
    private $userName;

    /**
     * @param ExpiryInfo[] $expiryInfo
     */
    public function __construct(
        ?string $action,
        ?\DateTimeImmutable $actionDate,
        ?bool $isCompleted,
        ?int $pointsDelta,
        ?string $name,
        ?string $pic,
        ?string $couponNumber,
        ?string $orderNum,
        ?string $debitedPointsDelta,
        ?int $storeDepartmentId,
        ?int $price,
        ?int $id,
        ?int $userId,
        ?string $userName,
        array $expiryInfo = []
    ) {
        $this->action = $action;
        $this->actionDate = $actionDate;
        $this->isCompleted = $isCompleted;
        $this->pointsDelta = $pointsDelta;
        $this->name = $name;
        $this->pic = $pic;
        $this->couponNumber = $couponNumber;
        $this->orderNum = $orderNum;
        $this->debitedPointsDelta = $debitedPointsDelta;
        $this->storeDepartmentId = $storeDepartmentId;
        $this->price = $price;
        $this->id = $id;
        $this->userId = $userId;
        $this->userName = $userName;
        $this->expiryInfo = $expiryInfo;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function getActionDate(): ?\DateTimeImmutable
    {
        return $this->actionDate;
    }

    public function getIsCompleted(): ?bool
    {
        return $this->isCompleted;
    }

    public function getPointsDelta(): ?int
    {
        return $this->pointsDelta;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getPic(): ?string
    {
        return $this->pic;
    }

    public function getCouponNumber(): ?string
    {
        return $this->couponNumber;
    }

    public function getOrderNum(): ?string
    {
        return $this->orderNum;
    }

    public function getDebitedPointsDelta(): ?string
    {
        return $this->debitedPointsDelta;
    }

    public function getStoreDepartmentId(): ?int
    {
        return $this->storeDepartmentId;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    /**
     * @return ExpiryInfo[]
     */
    public function getExpiryInfo(): array
    {
        return $this->expiryInfo;
    }
}
