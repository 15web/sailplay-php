<?php /** @noinspection ForgottenDebugOutputInspection */

declare(strict_types=1);

require_once 'tests/functional/bootstrap.php';

use Studio15\SailPlay\SDK\Api\Purchases\Create\Request\CartItem;
use Studio15\SailPlay\SDK\SailPlayApi;

$loginResponse = SailPlayApi::login(
    (int) $_ENV['STORE_DEPARTMENT_ID'],
    (int) $_ENV['STORE_DEPARTMENT_KEY'],
    (int) $_ENV['PIN_CODE']
);

$cartItems = [
    new CartItem($sku = 'item1', $price = 1000, $quantity = 10),
    new CartItem($sku = 'item2', $price = 2000, $quantity = 20),
    new CartItem($sku = 'item3', $price = 3000, $quantity = 30),
    new CartItem($sku = 'item4', $price = 4000, $quantity = 40),
];

$attrs = [
    new \Studio15\SailPlay\SDK\Api\Purchases\Create\Request\Attribute('bigamy_king', true),
    new \Studio15\SailPlay\SDK\Api\Purchases\Create\Request\Attribute('test_string', 'sto'),
];

$purchasesResponse = SailPlayApi::purchasesNew(
    $loginResponse->getToken(),
    (int) $_ENV['STORE_DEPARTMENT_ID'],
    (string) $_ENV['ORDER_NUM'],
    (string) $_ENV['USER_PHONE'],
    $cartItems,
    null,
    null,
    null,
    null,
    $attrs,
    null
);

var_dump($purchasesResponse);
