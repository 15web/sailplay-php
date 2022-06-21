<?php

namespace Studio15\SailPlay\SDK\Api\Promocodes\Activate;

use Webmozart\Assert\Assert;

/**
 * @see https://ru.sailplay.dev/reference/promocodes-activate
 */
final class ActivateRequest
{
    /**
     * Идентификатор департамента
     *
     * @var int
     */
    private $storeDepartmentId;

    /**
     * Номер телефона
     *
     * @var string
     */
    private $userPhone;

    /**
     * Наименование группы
     *
     * @var string
     */
    private $groupName;

    /**
     * Промокод
     *
     * @var string
     */
    private $number;

    public function __construct(
        int $storeDepartmentId,
        string $userPhone,
        string $groupName,
        string $number
    ) {
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::regex($userPhone, '/^7\d{10}$/');
        Assert::notEmpty($groupName);
        Assert::notEmpty($number);

        $this->storeDepartmentId = $storeDepartmentId;
        $this->userPhone = $userPhone;
        $this->groupName = $groupName;
        $this->number = $number;
    }

    public function getStoreDepartmentId(): int
    {
        return $this->storeDepartmentId;
    }

    public function getUserPhone(): string
    {
        return $this->userPhone;
    }

    public function getGroupName(): string
    {
        return $this->groupName;
    }

    public function getNumber(): string
    {
        return $this->number;
    }
}
