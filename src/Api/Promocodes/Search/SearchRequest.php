<?php

namespace Studio15\SailPlay\SDK\Api\Promocodes\Search;

use Webmozart\Assert\Assert;

/**
 * @see https://ru.sailplay.dev/reference/promocodes-search
 */
final class SearchRequest
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
     * @var string|null
     */
    private $userPhone;

    /**
     * Промокод
     *
     * @var string
     */
    private $number;

    public function __construct(
        int $storeDepartmentId,
        string $number,
        ?string $userPhone = null
    ) {
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::nullOrRegex($userPhone, '/^7\d{10}$/');
        Assert::notEmpty($number);

        $this->storeDepartmentId = $storeDepartmentId;
        $this->userPhone = $userPhone;
        $this->number = $number;
    }

    public function getStoreDepartmentId(): int
    {
        return $this->storeDepartmentId;
    }

    public function getUserPhone(): ?string
    {
        return $this->userPhone;
    }

    public function getNumber(): string
    {
        return $this->number;
    }
}
