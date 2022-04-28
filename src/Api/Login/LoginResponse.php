<?php

namespace Studio15\SailPlay\SDK\Api\Login;

/**
 * @see https://ru.sailplay.dev/reference/login
 */
final class LoginResponse
{
    /**
     * Идентификатор департамента
     *
     * @var string
     */
    private $status;
    /**
     * Токен доступа к API
     *
     * @var string
     */
    private $token;
    /**
     * Пин-коды менеджеров, связанных с департаментом
     *
     * @var int[]
     */
    private $pinCodes;
    /**
     * Пин-коды менеджеров, связанных с департаментом
     *
     * @var int[]
     */
    private $pinCodesManagers;
    /**
     * @var bool
     */
    private $isOrderNumPurchase;

    /**
     * @param int[] $pinCodes
     * @param int[] $pinCodesManagers
     */
    public function __construct(
        string $status,
        string $token,
        array $pinCodes,
        array $pinCodesManagers,
        bool $isOrderNumPurchase
    ) {
        $this->status = $status;
        $this->token = $token;
        $this->pinCodes = $pinCodes;
        $this->pinCodesManagers = $pinCodesManagers;
        $this->isOrderNumPurchase = $isOrderNumPurchase;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return int[]
     */
    public function getPinCodes(): array
    {
        return $this->pinCodes;
    }

    /**
     * @return int[]
     */
    public function getPinCodesManagers(): array
    {
        return $this->pinCodesManagers;
    }

    public function isOrderNumPurchase(): bool
    {
        return $this->isOrderNumPurchase;
    }
}
