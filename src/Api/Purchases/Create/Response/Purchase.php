<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\Create\Response;

/**
 * @see https://ru.sailplay.dev/reference/purchases-new
 */
final class Purchase
{
    /**
     * Идентификатор
     *
     * @var int|null
     */
    private $id;

    /**
     * Идентификатор департамента
     *
     * @var int|null
     */
    private $storeDepartmentId;

    /**
     * Цена
     *
     * @var string|null
     */
    private $price;

    /**
     * Разница очков
     *
     * @var int|null
     */
    private $pointsDelta;

    /**
     * Номер заказа
     *
     * @var string|null
     */
    private $orderNum;

    /**
     * Публичный ключ
     *
     * @var string|null
     */
    private $publicKey;

    /**
     * ПИН-код сотрудника
     *
     * @var string|null
     */
    private $clerkPin;

    /**
     * Дата заказа
     *
     * @var \DateTimeImmutable|null
     */
    private $purchaseDate;

    /**
     * Дата подтверждения заказа
     *
     * @var \DateTimeImmutable|null
     */
    private $completedDate;

    /**
     * Подтверждена
     *
     * @var bool|null
     */
    private $isCompleted;

    /**
     * Атрибуты покупки
     *
     * @var array<mixed>|null
     */
    private $attrs;

    /**
     * @param array<mixed>|null $attrs
     */
    public function __construct(
        ?int $id,
        ?int $storeDepartmentId,
        ?string $price,
        ?int $pointsDelta,
        ?string $orderNum,
        ?string $public_key,
        ?string $clerkPin,
        ?\DateTimeImmutable $purchaseDate,
        ?\DateTimeImmutable $completedDate,
        ?bool $isCompleted,
        ?array $attrs
    ) {
        $this->id = $id;
        $this->storeDepartmentId = $storeDepartmentId;
        $this->price = $price;
        $this->pointsDelta = $pointsDelta;
        $this->orderNum = $orderNum;
        $this->publicKey = $public_key;
        $this->clerkPin = $clerkPin;
        $this->purchaseDate = $purchaseDate;
        $this->completedDate = $completedDate;
        $this->isCompleted = $isCompleted;
        $this->attrs = $attrs;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStoreDepartmentId(): ?int
    {
        return $this->storeDepartmentId;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function getPointsDelta(): ?int
    {
        return $this->pointsDelta;
    }

    public function getOrderNum(): ?string
    {
        return $this->orderNum;
    }

    public function getPublicKey(): ?string
    {
        return $this->publicKey;
    }

    public function getClerkPin(): ?string
    {
        return $this->clerkPin;
    }

    public function getPurchaseDate(): ?\DateTimeImmutable
    {
        return $this->purchaseDate;
    }

    public function getCompletedDate(): ?\DateTimeImmutable
    {
        return $this->completedDate;
    }

    public function getIsCompleted(): ?bool
    {
        return $this->isCompleted;
    }

    /**
     * @return array<mixed>|null
     */
    public function getAttrs(): ?array
    {
        return $this->attrs;
    }
}
