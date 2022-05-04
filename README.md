# SailPlay PHP SDK

## Использование

```php
<?php

require_once 'vendor/autoload.php';

// отправляем запрос на получение токена
$loginResponse = Studio15\SailPlay\SDK\Api\ApiFacade::login(
    $storeDepartmentId = 12345,
    $storeDepartmentKey = 12345678,
    $pinCode = 1234
);

// отправляем запрос на получение информации о клиенте
$userInfoResponse = Studio15\SailPlay\SDK\Api\ApiFacade::usersInfo(
    $loginResponse->getToken(),
    $storeDepartmentId = 12345,
    $userPhone = '79991234567'
);

var_dump($userInfoResponse);
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
./bin/run.bash php tests/functional/Users/info.php
```

### Copyright and license

Copyright © [Studio 15](http://15web.ru), 2012 - Present.   
Code released under [the MIT license](https://opensource.org/licenses/MIT).

We use [BrowserStack](https://www.browserstack.com/) for cross browser testing.

![BrowserStack](http://15web.github.io/web-accessibility/images/browserstack_logo.png)