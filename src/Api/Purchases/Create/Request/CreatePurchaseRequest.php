<?php

namespace Studio15\SailPlay\SDK\Api\Purchases\Create\Request;

use Studio15\SailPlay\SDK\Infrastructure\Serializer\JsonObject\JsonObjectsArray;
use Studio15\SailPlay\SDK\Infrastructure\Serializer\JsonObjectsAssociativeArray\JsonObjectsAssociativeArray;
use Webmozart\Assert\Assert;

/**
 * @see https://ru.sailplay.dev/reference/purchases-new
 */
final class CreatePurchaseRequest
{
    /**
     * Идентификатор департамента
     *
     * @var int
     */
    private $storeDepartmentId;

    /**
     * Номер телефона клиента
     * Пример: 79991234567
     *
     * @var string|null
     */
    private $userPhone;

    /**
     * Номер заказа
     *
     * @var string
     */
    private $orderNum;

    /**
     * Корзина в виде JSON строки
     *
     * @var ?JsonObjectsArray<CartItem>
     */
    private $cart;

    /**
     * Форсированное подтверждение покупки
     *
     * @var bool|null
     */
    private $forceComplete;

    /**
     * Расширенный ответ сервера
     *
     * @var int|null
     */
    private $verbose;

    /**
     * Список промокодов
     *
     * @var string[]|null
     */
    private $promocodes;

    /**
     * Кол-во баллов к списанию в счет скидки
     *
     * @var int|null
     */
    private $discountPointsWriteoffm;

    /**
     * Атрибуты покупки
     *
     * @var JsonObjectsAssociativeArray<Attribute>|null
     */
    private $attrs;

    /**
     * Идентификатор целевого департамента
     *
     * @var string|null
     */
    private $targetDepId;

    /**
     * @param ?CartItem[] $cartItems
     * @param ?string[] $promocodes
     * @param ?Attribute[] $attrs
     */
    public function __construct(
        int $storeDepartmentId,
        string $orderNum,
        ?string $userPhone,
        ?array $cartItems,
        ?bool $forceComplete,
        ?int $verbose,
        ?array $promocodes,
        ?int $discountPointsWriteoffm,
        ?array $attrs,
        ?string $targetDepId
    ) {
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::notEmpty($orderNum);
        Assert::nullOrRegex($userPhone, '/^7\d{10}$/');

        $this->storeDepartmentId = $storeDepartmentId;
        $this->userPhone = $userPhone;
        $this->orderNum = $orderNum;
        $this->forceComplete = $forceComplete;
        $this->verbose = $verbose;
        $this->promocodes = $promocodes;
        $this->discountPointsWriteoffm = $discountPointsWriteoffm;
        $this->targetDepId = $targetDepId;

        $this->setCart($cartItems);
        $this->setAttr($attrs);
    }

    public function getStoreDepartmentId(): int
    {
        return $this->storeDepartmentId;
    }

    public function getUserPhone(): ?string
    {
        return $this->userPhone;
    }

    public function getOrderNum(): string
    {
        return $this->orderNum;
    }

    /**
     * @return ?JsonObjectsArray<CartItem>
     */
    public function getCart(): ?JsonObjectsArray
    {
        return $this->cart;
    }

    public function getForceComplete(): ?bool
    {
        return $this->forceComplete;
    }

    public function getVerbose(): ?int
    {
        return $this->verbose;
    }

    /**
     * @return ?string[]
     */
    public function getPromocodes(): ?array
    {
        return $this->promocodes;
    }

    public function getDiscountPointsWriteoffm(): ?int
    {
        return $this->discountPointsWriteoffm;
    }

    /**
     * @return JsonObjectsAssociativeArray<Attribute>|null
     */
    public function getAttrs(): ?JsonObjectsAssociativeArray
    {
        return $this->attrs;
    }

    public function getTargetDepId(): ?string
    {
        return $this->targetDepId;
    }

    /**
     * @param CartItem[] $cartItems
     *
     * Массив элементов корзины должен иметь:
     *   "Порядковый номер товара в корзине (позиция строки в чеке)" http://docs.sailplay.ru/ru/page/api-marketing-actions/
     *   Пример: {"1":{"sku":"item1","price":1000,"quantity":1,"discount_points":0,"min_price":250}}
     * Так как JsonObjectsArray сериализуется в JSON, достаточно выставить ключи массива, начиная м единицы
     */
    private function setCart(?array $cartItems): void
    {
        if ($cartItems === null) {
            return;
        }

        $keysStartingWith1 = range(1, \count($cartItems));

        $cartItemsStartingWith1 = array_combine($keysStartingWith1, $cartItems);

        if ($cartItemsStartingWith1 === false) {
            throw new \LogicException('number of elements for each array isn\'t equal or if the arrays are empty');
        }

        $this->cart = new JsonObjectsArray($cartItemsStartingWith1);
    }

    /**
     * Массив атрибутов сериализуем в json вида: {"alias_атрибута":"значение_атрибута", "alias_атрибута":"значение_атрибута"}
     * Пример: {"bigamy_king": true, "test_string": "sto"}
     *
     * @param Attribute[]|null $attr
     */
    private function setAttr(?array $attr): void
    {
        if ($attr === null) {
            return;
        }

        if (\count($attr) === 0) {
            return;
        }

        $this->attrs = new JsonObjectsAssociativeArray($attr);
    }
}
