<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Promocodes\ListGroups\Response;

final class PromocodesGroups
{
    /**
     * @var PromocodesGroup[]|null
     */
    private $disabled;

    /**
     * @var PromocodesGroup[]|null
     */
    private $enabled;

    /**
     * @param PromocodesGroup[]|null $disabled
     * @param PromocodesGroup[]|null $enabled
     */
    public function __construct(
        ?array $disabled,
        ?array $enabled
    ) {
        $this->disabled = $disabled;
        $this->enabled = $enabled;
    }

    /**
     * @return PromocodesGroup[]|null
     */
    public function getDisabled(): ?array
    {
        return $this->disabled;
    }

    /**
     * @return PromocodesGroup[]|null
     */
    public function getEnabled(): ?array
    {
        return $this->enabled;
    }
}
