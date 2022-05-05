<?php /** @noinspection ForgottenDebugOutputInspection */

declare(strict_types=1);

require_once 'tests/functional/bootstrap.php';

use Studio15\SailPlay\SDK\Api\Login\AuthErrorException;
use Studio15\SailPlay\SDK\SailPlayApi;

try {
    $loginResponse = SailPlayApi::login(
        (int) $_ENV['STORE_DEPARTMENT_ID'],
        (int) $_ENV['STORE_DEPARTMENT_KEY'],
        (int) $_ENV['PIN_CODE']
    );
} catch (AuthErrorException $authErrorException) {
    echo "Ошибка аутентификации: {$authErrorException->getMessage()}";
    exit(1);
}

echo $loginResponse->getToken();
