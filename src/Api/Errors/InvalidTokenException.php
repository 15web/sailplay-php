<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Errors;

use Exception;
use Studio15\SailPlay\SDK\Infrastructure\Error\ApiErrorException;

final class InvalidTokenException extends Exception
{
    public function __construct(ApiErrorException $apiErrorException)
    {
        parent::__construct(
            $apiErrorException->getMessage(),
            $apiErrorException->getCode()
        );
    }
}
