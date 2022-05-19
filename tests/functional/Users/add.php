<?php /** @noinspection ForgottenDebugOutputInspection */

declare(strict_types=1);

require_once 'tests/functional/bootstrap.php';

use Studio15\SailPlay\SDK\SailPlayApi;

$loginResponse = SailPlayApi::login(
    (int) $_ENV['STORE_DEPARTMENT_ID'],
    (int) $_ENV['STORE_DEPARTMENT_KEY'],
    (int) $_ENV['PIN_CODE']
);

$addUserResponse = SailPlayApi::usersAdd(
    $loginResponse->getToken(),
    (int) $_ENV['STORE_DEPARTMENT_ID'],
    $_ENV['USER_ADD_PHONE'],
    'id1',
    'test_user@sailplay.ru',
    'Иван',
    'Иванович',
    'Иванов',
    \DateTimeImmutable::createFromFormat('Y-m-d', '2012-04-24'),
    1,
    \DateTimeImmutable::createFromFormat('Y-m-d', '2022-05-10')
);

var_dump($addUserResponse);
