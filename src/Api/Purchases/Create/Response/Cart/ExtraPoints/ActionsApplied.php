<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\Create\Response\Cart\ExtraPoints;

final class ActionsApplied
{
    /**
     * Alias
     *
     * @var string|null
     */
    private $alias;

    /**
     * Имя
     *
     * @var string|null
     */
    private $name;

    /**
     * Количество дополнительных баллов
     *
     * @var int|null
     */
    private $pointsDelta;

    public function __construct(?string $alias, ?string $name, ?int $pointsDelta)
    {
        $this->alias = $alias;
        $this->name = $name;
        $this->pointsDelta = $pointsDelta;
    }

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getPointsDelta(): ?int
    {
        return $this->pointsDelta;
    }
}
