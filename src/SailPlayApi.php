<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK;

use GuzzleHttp\Client;
use Psr\SimpleCache\CacheInterface;
use Studio15\SailPlay\SDK\Api\Login\Login;
use Studio15\SailPlay\SDK\Api\Login\LoginRequest;
use Studio15\SailPlay\SDK\Api\Login\LoginResponse;
use Studio15\SailPlay\SDK\Api\Users\Info\Info;
use Studio15\SailPlay\SDK\Api\Users\Info\InfoRequest;
use Studio15\SailPlay\SDK\Api\Users\Info\infoResponse;
use Studio15\SailPlay\SDK\Infrastructure\ApiHttpClient;
use Studio15\SailPlay\SDK\Infrastructure\DefaultApiHttpClient;
use Studio15\SailPlay\SDK\Infrastructure\Http\RequestFactory\DefaultServerRequestFactory;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Psr16Cache;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
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
     * @throws Throwable
     * @throws Infrastructure\Error\ApiErrorException
     */
    public static function usersInfo(
        string $token,
        int $storeDepartmentId,
        string $userPhone,
        int $history = 0,
        int $subscriptions = 0,
        int $multi = 0
    ): infoResponse {
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::regex($userPhone, '/^7\d{10}$/');
        Assert::inArray($history, [0, 1]);
        Assert::inArray($subscriptions, [0, 1]);
        Assert::inArray($multi, [0, 1]);

        $info = new Info(self::getClient());
        $infoRequest = new InfoRequest($storeDepartmentId, $userPhone);

        return ($info)($infoRequest, $token);
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

        $symfonySerializer = new Serializer(
            [new ObjectNormalizer(null, (new CamelCaseToSnakeCaseNameConverter()))],
            [new JsonEncoder()]
        );

        self::$apiHttpClient = new DefaultApiHttpClient(
            new Client(),
            new DefaultServerRequestFactory(),
            $symfonySerializer
        );

        return self::$apiHttpClient;
    }
}
