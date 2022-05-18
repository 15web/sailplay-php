<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\Create\Response;

use Studio15\SailPlay\SDK\Api\Purchases\Create\Response\Cart\MarketingAction;
use Studio15\SailPlay\SDK\Api\Purchases\Create\Response\Cart\Recommendation;

final class Cart
{
    /**
     * @var Cart\Cart|null
     */
    private $cart;

    /**
     * @var MarketingAction[]|null
     */
    private $marketingActionsApplied;

    /**
     * @var MarketingAction[]|null
     */
    private $possibleMarketingActions;

    /**
     * @var Recommendation[]|null
     */
    private $recommendations;

    /**
     * @param MarketingAction[]|null $marketingActionsApplied
     * @param MarketingAction[]|null $possibleMarketingActions
     * @param Recommendation[]|null $recommendations
     */
    public function __construct(
        ?Cart\Cart $cart,
        ?array $marketingActionsApplied,
        ?array $possibleMarketingActions,
        ?array $recommendations
    ) {
        $this->cart = $cart;
        $this->marketingActionsApplied = $marketingActionsApplied;
        $this->possibleMarketingActions = $possibleMarketingActions;
        $this->recommendations = $recommendations;
    }

    public function getCart(): ?Cart\Cart
    {
        return $this->cart;
    }

    /**
     * @return MarketingAction[]|null
     */
    public function getMarketingActionsApplied(): ?array
    {
        return $this->marketingActionsApplied;
    }

    /**
     * @return MarketingAction[]|null
     */
    public function getPossibleMarketingActions(): ?array
    {
        return $this->possibleMarketingActions;
    }

    /**
     * @return Recommendation[]|null
     */
    public function getRecommendations(): ?array
    {
        return $this->recommendations;
    }
}
