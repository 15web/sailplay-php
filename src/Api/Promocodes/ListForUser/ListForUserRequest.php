<?php

namespace Studio15\SailPlay\SDK\Api\Promocodes\ListForUser;

use Webmozart\Assert\Assert;

/**
 * @see https://ru.sailplay.dev/reference/promocodes-list-for-user
 */
final class ListForUserRequest
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

    public function __construct(
        int $storeDepartmentId,
        string $userPhone
    ) {
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::regex($userPhone, '/^7\d{10}$/');

        $this->storeDepartmentId = $storeDepartmentId;
        $this->userPhone = $userPhone;
    }

    public function getStoreDepartmentId(): int
    {
        return $this->storeDepartmentId;
    }

    public function getUserPhone(): string
    {
        return $this->userPhone;
    }
}
