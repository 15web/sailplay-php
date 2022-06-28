<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Promocodes\Search\Response;

final class IssuedTo
{
    /**
     * Идентификатор клиента
     *
     * @var int|null
     */
    private $id;

    /**
     * Имя
     *
     * @var string|null
     */
    private $name;

    public function __construct(
        ?int $id,
        ?string $name
    ) {
        $this->id = $id;
        $this->name = $name;
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
