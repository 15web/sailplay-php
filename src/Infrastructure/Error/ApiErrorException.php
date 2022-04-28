<?php

namespace Studio15\SailPlay\SDK\Infrastructure\Error;

final class ApiErrorException extends \Exception
{
    public function __construct(string $message, ?int $code)
    {
        parent::__construct($message, $code ?? 0);
    }
}
