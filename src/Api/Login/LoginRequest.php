<?php

namespace Studio15\SailPlay\SDK\Api\Login;

use Webmozart\Assert\Assert;

/**
 * @see https://ru.sailplay.dev/reference/login
 */
final class LoginRequest
{
    /**
     * Идентификатор департамента
     *
     * @var int
     */
    private $storeDepartmentId;

    /**
     * Ключ департамента
     *
     * @var int
     */
    private $storeDepartmentKey;

    /**
     * Пин-код
     *
     * @var int
     */
    private $pinCode;

    public function __construct(
        int $storeDepartmentId,
        int $storeDepartmentKey,
        int $pinCode
    ) {
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::greaterThan($storeDepartmentKey, 0);
        Assert::greaterThan($pinCode, 0);

        $this->storeDepartmentId = $storeDepartmentId;
        $this->storeDepartmentKey = $storeDepartmentKey;
        $this->pinCode = $pinCode;
    }

    public function getStoreDepartmentId(): int
    {
        return $this->storeDepartmentId;
    }

    public function getStoreDepartmentKey(): int
    {
        return $this->storeDepartmentKey;
    }

    public function getPinCode(): int
    {
        return $this->pinCode;
    }
}
