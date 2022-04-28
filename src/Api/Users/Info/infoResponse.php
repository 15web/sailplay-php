<?php

namespace Studio15\SailPlay\SDK\Api\Users\Info;

/**
 * @see https://ru.sailplay.dev/reference/users-info
 */
final class infoResponse
{
    /**
     * Статус ответа
     *
     * @var string
     */
    private $status;

    public function __construct(
        string $status
    ) {
        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
