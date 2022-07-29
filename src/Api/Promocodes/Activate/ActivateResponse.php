<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Promocodes\Activate;

/**
 * @see https://ru.sailplay.dev/reference/promocodes-activate
 */
final class ActivateResponse
{
    /**
     * Статус ответа
     *
     * @var string|null
     */
    private $status;

    /**
     * Статус
     *
     * @var int|null
     */
    private $promocodeStatus;

    public function __construct(
        ?string $status,
        ?int $promocodeStatus
    ) {
        $this->status = $status;
        $this->promocodeStatus = $promocodeStatus;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function getPromocodeStatus(): ?int
    {
        return $this->promocodeStatus;
    }
}
