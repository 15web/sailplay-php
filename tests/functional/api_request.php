<?php
/** @noinspection ForgottenDebugOutputInspection */
/** @noinspection PhpFullyQualifiedNameUsageInspection */

declare(strict_types=1);

require_once 'vendor/autoload.php';

$client = \Studio15\SailPlay\SDK\Infrastructure\DefaultApiHttpClientFactory::create();

$login = new \Studio15\SailPlay\SDK\Api\Login\Login($client);

$loginRequest = new \Studio15\SailPlay\SDK\Api\Login\LoginRequest(12345, 12345678, 1234);

$loginResponse = ($login)($loginRequest);

var_dump(
    $loginResponse->getToken()
);
