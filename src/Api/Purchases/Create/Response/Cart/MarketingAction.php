<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Purchases\Create\Response\Cart;

final class MarketingAction
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
     * Сервисное сообщение
     *
     * @var string|null
     */
    private $serviceMsg;

    /**
     * Клиентское сообщение
     *
     * @var string|null
     */
    private $clientMsg;

    public function __construct(
        ?string $alias,
        ?string $name,
        ?string $serviceMsg,
        ?string $clientMsg
    ) {
        $this->alias = $alias;
        $this->name = $name;
        $this->serviceMsg = $serviceMsg;
        $this->clientMsg = $clientMsg;
    }

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getServiceMsg(): ?string
    {
        return $this->serviceMsg;
    }

    public function getClientMsg(): ?string
    {
        return $this->clientMsg;
    }
}
