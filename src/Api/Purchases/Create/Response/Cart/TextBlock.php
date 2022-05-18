<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\Create\Response\Cart;

final class TextBlock
{
    /**
     * @var MarketingAction[]|null
     */
    private $marketingActions;

    /**
     * @var string|null
     */
    private $value;

    /**
     * @param MarketingAction[]|null $marketingActions
     */
    public function __construct(?array $marketingActions, ?string $value)
    {
        $this->marketingActions = $marketingActions;
        $this->value = $value;
    }

    /**
     * @return ?MarketingAction[]
     */
    public function getMarketingAction(): ?array
    {
        return $this->marketingActions;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }
}
