<?php /** @noinspection ForgottenDebugOutputInspection */

declare(strict_types=1);

require_once 'tests/functional/bootstrap.php';

use Studio15\SailPlay\SDK\SailPlayApi;

$loginResponse = SailPlayApi::login(
    (int) $_ENV['STORE_DEPARTMENT_ID'],
    (int) $_ENV['STORE_DEPARTMENT_KEY'],
    (int) $_ENV['PIN_CODE']
);

$infoResponse = SailPlayApi::usersInfo(
    $loginResponse->getToken(),
    (int) $_ENV['STORE_DEPARTMENT_ID'],
    (string) $_ENV['USER_PHONE'],
    $history = true,
    $subscriptions = true,
    $multi = false
);

var_dump($infoResponse);
