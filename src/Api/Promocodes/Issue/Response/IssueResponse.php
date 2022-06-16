<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Promocodes\Issue\Response;

/**
 * @see https://ru.sailplay.dev/reference/promocodes-issue
 */
final class IssueResponse
{
    /**
     * Статус ответа
     *
     * @var string|null
     */
    private $status;

    /**
     * @var Promocode|null
     */
    private $promocode;

    public function __construct(
        ?string $status,
        ?Promocode $promocode
    ) {
        $this->status = $status;
        $this->promocode = $promocode;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function getPromocode(): ?Promocode
    {
        return $this->promocode;
    }
}
