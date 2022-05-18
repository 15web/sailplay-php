# SailPlay PHP SDK

## Установка
```shell
composer require 15web/sailplay-sdk
```

## Использование
```php
<?php

require_once 'vendor/autoload.php';

try {
    // отправляем запрос на получение токена
    $loginResponse = \Studio15\SailPlay\SDK\SailPlayApi::login(
        $storeDepartmentId = 12345,
        $storeDepartmentKey = 12345678,
        $pinCode = 1234
    );
// при наличии в ответе ошибки будет выброшено соответствующее исключение
} catch (\Studio15\SailPlay\SDK\Api\Login\AuthErrorException $authErrorException) {
    echo "Ошибка аутентификации: {$authErrorException->getMessage()}";
}

// ответ - это объект с геттерами доступных полей
$token = $loginResponse->getToken();

// отправляем запрос на получение информации о клиенте
$userInfoResponse = \Studio15\SailPlay\SDK\SailPlayApi::usersInfo(
    $token,
    $storeDepartmentId = 12345,
    $userPhone = '79991234567'
);

echo $userInfoResponse->getEmail();
```

## Разработка
### Сборка образа PHP (обязательно перед всеми операциями с run.bash)
```shell
./bin/docker_build.bash
```
### Установка зависимостей
```shell
./bin/run.bash composer install
```
### Запуск PHP
```shell
./bin/run.bash php tests/functional/Users/info.php
```
### Функциональные тесты
```shell
cp tests/functional/.env.dist tests/functional/.env
./bin/run.bash php tests/functional/Users/info.php
```
### Установка git hooks
```shell
./bin/hooks.bash
```
### Copyright and license

Copyright © [Studio 15](http://15web.ru), 2012 - Present.   
Code released under [the MIT license](https://opensource.org/licenses/MIT).

We use [BrowserStack](https://www.browserstack.com/) for cross browser testing.

![BrowserStack](http://15web.github.io/web-accessibility/images/browserstack_logo.png)
