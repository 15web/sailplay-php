<?php /** @noinspection ForgottenDebugOutputInspection */

declare(strict_types=1);

require_once 'tests/functional/bootstrap.php';

use Studio15\SailPlay\SDK\Api\Login\Login;
use Studio15\SailPlay\SDK\Api\Login\LoginRequest;
use Studio15\SailPlay\SDK\Infrastructure\DefaultApiHttpClientFactory;

$client = DefaultApiHttpClientFactory::create();

$login = new Login($client);
$loginRequest = new LoginRequest(
    (int) $_ENV['STORE_DEPARTMENT_ID'],
    (int) $_ENV['STORE_DEPARTMENT_KEY'],
    (int) $_ENV['PIN_CODE']
);
$loginResponse = ($login)($loginRequest);

var_dump(
    $loginResponse->getToken()
);
