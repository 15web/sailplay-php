<?php

namespace Studio15\SailPlay\SDK\Api\Users\Info;

use Webmozart\Assert\Assert;

/**
 * @see https://ru.sailplay.dev/reference/users-info
 */
final class InfoRequest
{
    /**
     * Идентификатор департамента
     *
     * @var int
     */
    private $storeDepartmentId;

    /**
     * Номер телефона или другой идентификатор
     * Пример: 79991234567
     *
     * @var string
     */
    private $userPhone;

    /**
     * @var int
     */
    private $history;

    /**
     * @var int
     */
    private $subscriptions;

    /**
     * @var int
     */
    private $multi;

    public function __construct(
        int $storeDepartmentId,
        string $userPhone,
        int $history = 0,
        int $subscriptions = 0,
        int $multi = 0
    ) {
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::regex($userPhone, '/^7\d{10}$/');
        Assert::inArray($history, [0, 1]);
        Assert::inArray($subscriptions, [0, 1]);
        Assert::inArray($multi, [0, 1]);

        $this->storeDepartmentId = $storeDepartmentId;
        $this->userPhone = $userPhone;
        $this->history = $history;
        $this->subscriptions = $subscriptions;
        $this->multi = $multi;
    }

    public function getStoreDepartmentId(): int
    {
        return $this->storeDepartmentId;
    }

    public function getUserPhone(): string
    {
        return $this->userPhone;
    }

    public function getHistory(): int
    {
        return $this->history;
    }

    public function getSubscriptions(): int
    {
        return $this->subscriptions;
    }

    public function getMulti(): int
    {
        return $this->multi;
    }
}
