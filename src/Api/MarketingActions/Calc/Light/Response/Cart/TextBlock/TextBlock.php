<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\MarketingActions\Calc\Light\Response\Cart\TextBlock;

final class TextBlock
{
    /**
     * @var MarketingAction[]|null
     */
    private $marketingAction;

    /**
     * @var string|null
     */
    private $value;

    /**
     * @param MarketingAction[]|null $marketingAction
     */
    public function __construct(
        ?array $marketingAction,
        ?string $value
    ) {
        $this->marketingAction = $marketingAction;
        $this->value = $value;
    }

    /**
     * @return MarketingAction[]|null
     */
    public function getMarketingAction(): ?array
    {
        return $this->marketingAction;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }
}
