<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\MarketingActions\Calc\Light\Response\Cart\ExtraPoints;

final class ExtraPoints
{
    /**
     * Количество дополнительных баллов
     *
     * @var int|null
     */
    private $pointsDelta;

    /**
     * @var ActionsApplied[]|null
     */
    private $actionsApplied;

    /**
     * @param ActionsApplied[]|null $actionsApplied
     */
    public function __construct(
        ?int $pointsDelta,
        ?array $actionsApplied
    ) {
        $this->pointsDelta = $pointsDelta;
        $this->actionsApplied = $actionsApplied;
    }

    public function getPointsDelta(): ?int
    {
        return $this->pointsDelta;
    }

    /**
     * @return ActionsApplied[]|null
     */
    public function getActionsApplied(): ?array
    {
        return $this->actionsApplied;
    }
}
