<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Promocodes\Search\Response;

final class MarketingAction
{
    /**
     * Статус
     *
     * @var int|null
     */
    private $status;

    /**
     * Идентификатор
     *
     * @var int|null
     */
    private $id;

    /**
     * Наименование
     *
     * @var string|null
     */
    private $name;

    public function __construct(
        ?int $status,
        ?int $id,
        ?string $name
    ) {
        $this->status = $status;
        $this->id = $id;
        $this->name = $name;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
