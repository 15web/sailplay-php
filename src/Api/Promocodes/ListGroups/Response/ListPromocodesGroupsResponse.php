<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Promocodes\ListGroups\Response;

/**
 * @see https://ru.sailplay.dev/reference/promocodes-groups-list
 */
final class ListPromocodesGroupsResponse
{
    /**
     * Статус ответа
     *
     * @var string|null
     */
    private $status;

    /**
     * @var PromocodesGroups|null
     */
    private $groups;

    public function __construct(
        ?string $status,
        ?PromocodesGroups $groups
    ) {
        $this->status = $status;
        $this->groups = $groups;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function getGroups(): ?PromocodesGroups
    {
        return $this->groups;
    }
}
