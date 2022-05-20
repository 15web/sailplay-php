<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\MarketingActions\Calc\Light\Response;

use Studio15\SailPlay\SDK\Api\MarketingActions\Calc\Light\Response\Cart\Cart;

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
     * @var Cart
     */
    private $cart;

    /**
     * @var MarketingActionsApplied[]
     */
    private $marketingActionsApplied;

    /**
     * @var PossibleMarketingActions[]
     */
    private $possibleMarketingActions;

    /**
     * @var Recommendation[]
     */
    private $recommendations;

    /**
     * @param MarketingActionsApplied[] $marketingActionsApplied
     * @param PossibleMarketingActions[] $possibleMarketingActions
     * @param Recommendation[] $recommendations
     */
    public function __construct(
        string $status,
        Cart $cart,
        array $marketingActionsApplied,
        array $possibleMarketingActions,
        array $recommendations
    ) {
        $this->status = $status;
        $this->cart = $cart;
        $this->marketingActionsApplied = $marketingActionsApplied;
        $this->possibleMarketingActions = $possibleMarketingActions;
        $this->recommendations = $recommendations;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCart(): Cart
    {
        return $this->cart;
    }

    /**
     * @return MarketingActionsApplied[]
     */
    public function getMarketingActionsApplied(): array
    {
        return $this->marketingActionsApplied;
    }

    /**
     * @return PossibleMarketingActions[]
     */
    public function getPossibleMarketingActions(): array
    {
        return $this->possibleMarketingActions;
    }

    /**
     * @return Recommendation[]
     */
    public function getRecommendations(): array
    {
        return $this->recommendations;
    }
}
