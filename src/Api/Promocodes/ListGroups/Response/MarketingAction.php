<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Promocodes\ListGroups\Response;

final class MarketingAction
{
    /**
     * @var int|null
     */
    private $status;

    /**
     * Сервисное сообщение
     *
     * @var string|null
     */
    private $serviceMsg;

    /**
     * Имя
     *
     * @var string|null
     */
    private $name;

    /**
     * Клиентское сообщение
     *
     * @var string|null
     */
    private $clientMsg;

    /**
     * Alias
     *
     * @var string|null
     */
    private $alias;

    /**
     * Идентификатор
     *
     * @var int|null
     */
    private $id;

    public function __construct(
        ?int $status,
        ?string $serviceMsg,
        ?string $name,
        ?string $clientMsg,
        ?string $alias,
        ?int $id
    ) {
        $this->status = $status;
        $this->serviceMsg = $serviceMsg;
        $this->name = $name;
        $this->clientMsg = $clientMsg;
        $this->alias = $alias;
        $this->id = $id;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function getServiceMsg(): ?string
    {
        return $this->serviceMsg;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getClientMsg(): ?string
    {
        return $this->clientMsg;
    }

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
