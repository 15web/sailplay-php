<?php /** @noinspection ForgottenDebugOutputInspection */

declare(strict_types=1);

require_once 'tests/functional/bootstrap.php';


use Studio15\SailPlay\SDK\Api\MarketingActions\Calc\CartItem;
use Studio15\SailPlay\SDK\SailPlayApi;

$loginResponse = SailPlayApi::login(
    (int) $_ENV['STORE_DEPARTMENT_ID'],
    (int) $_ENV['STORE_DEPARTMENT_KEY'],
    (int) $_ENV['PIN_CODE']
);

$cartItems = [
    new CartItem($sku = 'item1', $price = 1000, $quantity = 10, $minPrice = 50),
    new CartItem($sku = 'item2', $price = 2000, $quantity = 20, $minPrice = 100),
    new CartItem($sku = 'item3', $price = 3000, $quantity = 30, $minPrice = 200),
    new CartItem($sku = 'item4', $price = 4000, $quantity = 40, $minPrice = 400),
];

$lightResponse = SailPlayApi::marketingActionsCalcLight(
    $loginResponse->getToken(),
    (int) $_ENV['STORE_DEPARTMENT_ID'],
    ['PROMO1', 'PROMO2', 'PROMO3'],
    $cartItems
);

var_dump($lightResponse);
