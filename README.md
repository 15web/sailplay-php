# SailPlay PHP SDK

## Использование

```php
<?php

require_once 'vendor/autoload.php';

$client = \Studio15\SailPlay\SDK\Infrastructure\DefaultApiHttpClientFactory::create();

$login = new \Studio15\SailPlay\SDK\Api\Login\Login($client);

$loginRequest = new \Studio15\SailPlay\SDK\Api\Login\LoginRequest(12345, 12345678, 1234);

$loginResponse = ($login)($loginRequest);

var_dump(
    $loginResponse->getToken()
);
```

## Разработка
### Установка зависимостей
```shell
./bin/run.bash composer install
```
### Установка git hooks
```shell
./bin/hooks.bash
```
### Запуск PHP
```shell
./bin/run.bash php tests/functional/api_request.php
```
