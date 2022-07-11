<?php /** @noinspection ForgottenDebugOutputInspection */

declare(strict_types=1);

require_once 'tests/functional/bootstrap.php';

use Studio15\SailPlay\SDK\SailPlayApi;

$loginResponse = SailPlayApi::login(
    (int) $_ENV['STORE_DEPARTMENT_ID'],
    (int) $_ENV['STORE_DEPARTMENT_KEY'],
    (int) $_ENV['PIN_CODE']
);

$listResponse = SailPlayApi::purchaseAttributesList(
    $loginResponse->getToken(),
    (int) $_ENV['STORE_DEPARTMENT_ID']
);

var_dump($listResponse);
