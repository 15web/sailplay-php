# SailPlay PHP SDK

## Использование

```php
<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

$client = new Studio15\SailPlay\SDK\Http\PsrClientAdapter(
    new GuzzleHttp\Client(),
    new Studio15\SailPlay\SDK\Http\DefaultServerRequestFactory()
);

(new Studio15\SailPlay\SDK\Api\Login($client))();
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
