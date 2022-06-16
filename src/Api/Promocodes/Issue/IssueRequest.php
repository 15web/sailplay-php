<?php

namespace Studio15\SailPlay\SDK\Api\Promocodes\Issue;

use Webmozart\Assert\Assert;

/**
 * @see https://ru.sailplay.dev/reference/promocodes-issue
 */
final class IssueRequest
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

    public function __construct(
        int $storeDepartmentId,
        string $userPhone,
        string $groupName
    ) {
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::regex($userPhone, '/^7\d{10}$/');
        Assert::notEmpty($groupName);

        $this->storeDepartmentId = $storeDepartmentId;
        $this->userPhone = $userPhone;
        $this->groupName = $groupName;
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
}
