<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Promocodes\ListForUser\Response;

/**
 * @see https://ru.sailplay.dev/reference/promocodes-list-for-user
 */
final class ListForUserResponse
{
    /**
     * Статус ответа
     *
     * @var string|null
     */
    private $status;

    /**
     * @var Promocode[]|null
     */
    private $promocodes;

    /**
     * @param Promocode[]|null $promocodes
     */
    public function __construct(
        ?string $status,
        ?array $promocodes
    ) {
        $this->status = $status;
        $this->promocodes = $promocodes;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @return Promocode[]|null
     */
    public function getPromocodes(): ?array
    {
        return $this->promocodes;
    }
}
