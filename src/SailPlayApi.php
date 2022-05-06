<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK;

use GuzzleHttp\Client;
use Psr\SimpleCache\CacheInterface;
use Studio15\SailPlay\SDK\Api\Login\Login;
use Studio15\SailPlay\SDK\Api\Login\LoginRequest;
use Studio15\SailPlay\SDK\Api\Login\LoginResponse;
use Studio15\SailPlay\SDK\Api\MarketingActions\Calc\CartItem;
use Studio15\SailPlay\SDK\Api\MarketingActions\Calc\Light\Light;
use Studio15\SailPlay\SDK\Api\MarketingActions\Calc\Light\LightRequest;
use Studio15\SailPlay\SDK\Api\MarketingActions\Calc\Light\LightResponse;
use Studio15\SailPlay\SDK\Api\Users\Info\Info;
use Studio15\SailPlay\SDK\Api\Users\Info\InfoRequest;
use Studio15\SailPlay\SDK\Api\Users\Info\Response\infoResponse;
use Studio15\SailPlay\SDK\Api\Users\UserNotFoundException;
use Studio15\SailPlay\SDK\Infrastructure\ApiHttpClient;
use Studio15\SailPlay\SDK\Infrastructure\DefaultApiHttpClient;
use Studio15\SailPlay\SDK\Infrastructure\Error\ApiErrorException;
use Studio15\SailPlay\SDK\Infrastructure\Http\RequestFactory\DefaultServerRequestFactory;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Psr16Cache;
use Throwable;
use Webmozart\Assert\Assert;

final class SailPlayApi
{
    /**
     * @var ApiHttpClient|null
     */
    private static $apiHttpClient;

    /**
     * @var CacheInterface|null
     */
    private static $cache;

    /**
     * @throws Api\Login\AuthErrorException
     * @throws Infrastructure\Error\ApiErrorException
     * @throws Throwable
     */
    public static function login(int $storeDepartmentId, int $storeDepartmentKey, int $pinCode): LoginResponse
    {
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::greaterThan($storeDepartmentKey, 0);
        Assert::greaterThan($pinCode, 0);

        $login = new Login(self::getClient(), self::getCache());
        $loginRequest = new LoginRequest($storeDepartmentId, $storeDepartmentKey, $pinCode);

        return ($login)($loginRequest);
    }

    /**
     * @throws UserNotFoundException
     * @throws ApiErrorException
     * @throws Throwable
     */
    public static function usersInfo(
        string $token,
        int $storeDepartmentId,
        string $userPhone,
        bool $history = false,
        bool $subscriptions = false,
        bool $multi = false
    ): infoResponse {
        Assert::notEmpty($token);
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::regex($userPhone, '/^7\d{10}$/');

        $info = new Info(self::getClient());
        $infoRequest = new InfoRequest(
            $storeDepartmentId,
            $userPhone,
            (int) $history,
            (int) $subscriptions,
            (int) $multi
        );

        return ($info)($infoRequest, $token);
    }

    /**
     * @param string[] $promocodes
     * @param CartItem[] $cartItems
     *
     * @throws ApiErrorException
     * @throws Throwable
     */
    public static function marketingActionsCalcLight(
        string $token,
        int $storeDepartmentId,
        array $promocodes,
        array $cartItems
    ): LightResponse {
        Assert::notEmpty($token);
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::allString($promocodes);
        Assert::minCount($cartItems, 1);
        Assert::allIsInstanceOf($cartItems, \get_class($cartItems[0]));

        $light = new Light(self::getClient());
        $lightRequest = new LightRequest($storeDepartmentId, $promocodes, $cartItems);

        return ($light)($lightRequest, $token);
    }

    public static function getCache(): CacheInterface
    {
        if (self::$cache !== null) {
            return self::$cache;
        }

        $filesystemCachePool = new FilesystemAdapter('', 86400, __DIR__.'/../var/cache');
        self::$cache = new Psr16Cache($filesystemCachePool);

        return self::$cache;
    }

    private static function getClient(): ApiHttpClient
    {
        if (self::$apiHttpClient !== null) {
            return self::$apiHttpClient;
        }

        self::$apiHttpClient = new DefaultApiHttpClient(
            new Client(),
            new DefaultServerRequestFactory()
        );

        return self::$apiHttpClient;
    }
}
