<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\MarketingActions\Calc\Light;

/**
 * @see https://ru.sailplay.dev/reference/marketing-actions-calc-light
 */
final class LightResponse
{
    /**
     * Статус ответа
     *
     * @var string
     */
    private $status;

    /**
     * Идентификатор
     *
     * @var ?int
     */
    private $id;

    public function __construct(
        string $status,
        ?int $id
    ) {
        $this->status = $status;
        $this->id = $id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
