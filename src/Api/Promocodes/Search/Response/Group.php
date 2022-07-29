<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Promocodes\Search\Response;

final class Group
{
    /**
     * Статус
     *
     * @var int|null
     */
    private $status;

    /**
     * Тип
     *
     * @var int|null
     */
    private $type;

    /**
     * Наименование
     *
     * @var string|null
     */
    private $name;

    public function __construct(
        ?int $status,
        ?int $type,
        ?string $name
    ) {
        $this->status = $status;
        $this->type = $type;
        $this->name = $name;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
