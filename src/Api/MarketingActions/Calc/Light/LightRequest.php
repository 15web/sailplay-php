<?php

namespace Studio15\SailPlay\SDK\Api\MarketingActions\Calc\Light;

use LogicException;
use Studio15\SailPlay\SDK\Api\MarketingActions\Calc\CartItem;
use Studio15\SailPlay\SDK\Infrastructure\Serializer\JsonObject\JsonObjectsArray;
use Webmozart\Assert\Assert;

/**
 * @see https://ru.sailplay.dev/reference/marketing-actions-calc-light
 */
final class LightRequest
{
    /**
     * Идентификатор департамента
     *
     * @var int
     */
    private $storeDepartmentId;

    /**
     * Список промокодов
     *
     * @var string[]
     */
    private $promocodes;

    /**
     * @var JsonObjectsArray<CartItem>
     */
    private $cart;

    /**
     * @param string[] $promocodes
     * @param CartItem[] $cartItems
     */
    public function __construct(
        int $storeDepartmentId,
        array $promocodes,
        array $cartItems
    ) {
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::allString($promocodes);

        $this->storeDepartmentId = $storeDepartmentId;
        $this->promocodes = $promocodes;
        $this->setCart($cartItems);
    }

    public function getStoreDepartmentId(): int
    {
        return $this->storeDepartmentId;
    }

    /**
     * @return string[]
     */
    public function getPromocodes(): array
    {
        return $this->promocodes;
    }

    /**
     * @return JsonObjectsArray<CartItem>
     */
    public function getCart(): JsonObjectsArray
    {
        return $this->cart;
    }

    /**
     * @param CartItem[] $cartItems
     *
     * Массив элементов корзины должен иметь:
     *   "Порядковый номер товара в корзине (позиция строки в чеке)" http://docs.sailplay.ru/ru/page/api-marketing-actions/
     *   Пример: {"1":{"sku":"item1","price":1000,"quantity":1,"discount_points":0,"min_price":250}}
     * Так как JsonObjectsArray сериализуется в JSON, достаточно выставить ключи массива, начиная м единицы
     */
    private function setCart(array $cartItems): void
    {
        $keysStartingWith1 = range(1, \count($cartItems));

        $cartItemsStartingWith1 = array_combine($keysStartingWith1, $cartItems);

        if ($cartItemsStartingWith1 === false) {
            throw new LogicException('number of elements for each array isn\'t equal or if the arrays are empty');
        }

        $this->cart = new JsonObjectsArray($cartItemsStartingWith1);
    }
}
