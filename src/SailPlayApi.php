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
use Studio15\SailPlay\SDK\Api\MarketingActions\Calc\Light\Response\LightResponse;
use Studio15\SailPlay\SDK\Api\Promocodes\Activate\Activate;
use Studio15\SailPlay\SDK\Api\Promocodes\Activate\ActivateRequest;
use Studio15\SailPlay\SDK\Api\Promocodes\Activate\ActivateResponse;
use Studio15\SailPlay\SDK\Api\Promocodes\Issue\Issue;
use Studio15\SailPlay\SDK\Api\Promocodes\Issue\IssueRequest;
use Studio15\SailPlay\SDK\Api\Promocodes\Issue\Response\IssueResponse;
use Studio15\SailPlay\SDK\Api\Promocodes\ListForUser\ListForUser;
use Studio15\SailPlay\SDK\Api\Promocodes\ListForUser\ListForUserRequest;
use Studio15\SailPlay\SDK\Api\Promocodes\ListForUser\Response\ListForUserResponse;
use Studio15\SailPlay\SDK\Api\Promocodes\ListGroups\ListPromocodesGroups;
use Studio15\SailPlay\SDK\Api\Promocodes\ListGroups\ListPromocodesGroupsRequest;
use Studio15\SailPlay\SDK\Api\Promocodes\ListGroups\Response\ListPromocodesGroupsResponse;
use Studio15\SailPlay\SDK\Api\Promocodes\Search\Response\SearchResponse;
use Studio15\SailPlay\SDK\Api\Promocodes\Search\Search;
use Studio15\SailPlay\SDK\Api\Promocodes\Search\SearchRequest;
use Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\Add\Add;
use Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\Add\AddRequest;
use Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\Add\AddResponse;
use Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\AddValues\AddValuesPurchaseAttributes;
use Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\AddValues\AddValuesPurchaseAttributesRequest;
use Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\AddValues\AddValuesPurchaseAttributesResponse;
use Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\Delete\DeletePurchaseAttributes;
use Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\Delete\DeletePurchaseAttributesRequest;
use Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\Delete\DeletePurchaseAttributesResponse;
use Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\DeleteValues\DeleteValuesPurchaseAttributes;
use Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\DeleteValues\DeleteValuesPurchaseAttributesRequest;
use Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\DeleteValues\DeleteValuesPurchaseAttributesResponse;
use Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\ListAll\ListPurchaseAttributes;
use Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\ListAll\ListPurchaseAttributesRequest;
use Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\ListAll\Response\ListPurchaseAttributesResponse;
use Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\ListValues\ListValuesPurchaseAttributes;
use Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\ListValues\ListValuesPurchaseAttributesRequest;
use Studio15\SailPlay\SDK\Api\Purchases\PurchaseAttributes\ListValues\Response\ListValuesPurchaseAttributesResponse;
use Studio15\SailPlay\SDK\Api\Users\AddUser\AddUser;
use Studio15\SailPlay\SDK\Api\Users\AddUser\AddUserRequest;
use Studio15\SailPlay\SDK\Api\Users\AddUser\Response\AddUserResponse;
use Studio15\SailPlay\SDK\Api\Users\Info\Info;
use Studio15\SailPlay\SDK\Api\Users\Info\InfoRequest;
use Studio15\SailPlay\SDK\Api\Users\Info\Response\InfoResponse;
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
     * @throws ApiErrorException
     * @throws Throwable
     * @throws UserNotFoundException
     */
    public static function usersAdd(
        string $token,
        int $storeDepartmentId,
        ?string $userPhone = null,
        ?string $originUserId = null,
        ?string $email = null,
        ?string $firstName = null,
        ?string $middleName = null,
        ?string $lastName = null,
        ?\DateTimeImmutable $birthDate = null,
        ?int $sex = null,
        ?\DateTimeImmutable $registerDate = null,
        ?string $referrerOriginUserId = null,
        ?string $referrerPhone = null,
        ?string $referrerEmail = null,
        ?string $referrerPromocode = null
    ): AddUserResponse {
        Assert::notEmpty($token);
        Assert::nullOrRegex($userPhone, '/^7\d{10}$/');
        Assert::nullOrNotEmpty($originUserId);
        Assert::nullOrEmail($email);
        Assert::notEmpty($userPhone.$originUserId);
        Assert::nullOrInArray($sex, AddUserRequest::SEX);
        Assert::nullOrRegex($referrerPhone, '/^7\d{10}$/');
        Assert::nullOrEmail($referrerEmail);

        $addUser = new AddUser(self::getClient());

        $addUserRequest = new AddUserRequest(
            $storeDepartmentId,
            $userPhone,
            $originUserId,
            $email,
            $firstName,
            $middleName,
            $lastName,
            $birthDate,
            $sex,
            $registerDate,
            $referrerOriginUserId,
            $referrerPhone,
            $referrerEmail,
            $referrerPromocode
        );

        return ($addUser)($addUserRequest, $token);
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
    ): InfoResponse {
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

    /**
     * @throws ApiErrorException
     * @throws Throwable
     */
    public static function promocodesActivate(
        string $token,
        int $storeDepartmentId,
        string $userPhone,
        string $groupName,
        string $number
    ): ActivateResponse {
        Assert::notEmpty($token);
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::regex($userPhone, '/^7\d{10}$/');
        Assert::notEmpty($groupName);
        Assert::notEmpty($number);

        $activate = new Activate(self::getClient());
        $activateRequest = new ActivateRequest($storeDepartmentId, $userPhone, $groupName, $number);

        return ($activate)($activateRequest, $token);
    }

    /**
     * @throws ApiErrorException
     * @throws Throwable
     */
    public static function promocodesIssue(
        string $token,
        int $storeDepartmentId,
        string $userPhone,
        string $groupName
    ): IssueResponse {
        Assert::notEmpty($token);
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::regex($userPhone, '/^7\d{10}$/');
        Assert::notEmpty($groupName);

        $issue = new Issue(self::getClient());
        $issueRequest = new IssueRequest($storeDepartmentId, $userPhone, $groupName);

        return ($issue)($issueRequest, $token);
    }

    /**
     * @throws ApiErrorException
     * @throws Throwable
     */
    public static function promocodesListForUser(
        string $token,
        int $storeDepartmentId,
        string $userPhone
    ): ListForUserResponse {
        Assert::notEmpty($token);
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::regex($userPhone, '/^7\d{10}$/');

        $listForUser = new ListForUser(self::getClient());
        $listForUserRequest = new ListForUserRequest($storeDepartmentId, $userPhone);

        return ($listForUser)($listForUserRequest, $token);
    }

    /**
     * @throws ApiErrorException
     * @throws Throwable
     */
    public static function promocodesListGroups(
        string $token,
        int $storeDepartmentId
    ): ListPromocodesGroupsResponse {
        Assert::notEmpty($token);
        Assert::greaterThan($storeDepartmentId, 0);

        $listPromocodesGroups = new ListPromocodesGroups(self::getClient());
        $listPromocodesGroupsRequest = new ListPromocodesGroupsRequest($storeDepartmentId);

        return ($listPromocodesGroups)($listPromocodesGroupsRequest, $token);
    }

    /**
     * @throws ApiErrorException
     * @throws Throwable
     */
    public static function promocodesSearch(
        string $token,
        int $storeDepartmentId,
        string $number,
        ?string $userPhone = null
    ): SearchResponse {
        Assert::notEmpty($token);
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::nullOrRegex($userPhone, '/^7\d{10}$/');
        Assert::notEmpty($number);

        $search = new Search(self::getClient());
        $searchRequest = new SearchRequest($storeDepartmentId, $number, $userPhone);

        return ($search)($searchRequest, $token);
    }

    /**
     * @throws ApiErrorException
     * @throws Throwable
     */
    public static function purchaseAttributesAdd(
        string $token,
        int $storeDepartmentId,
        string $alias,
        string $valueType,
        ?string $description = null
    ): AddResponse {
        Assert::notEmpty($token);
        Assert::greaterThan($storeDepartmentId, 0);

        $add = new Add(self::getClient());
        $addRequest = new AddRequest($storeDepartmentId, $alias, $valueType, $description);

        return ($add)($addRequest, $token);
    }

    /**
     * @param mixed $value
     *
     * @throws ApiErrorException
     * @throws Throwable
     */
    public static function purchaseAttributesAddValues(
        string $token,
        int $storeDepartmentId,
        string $attrAlias,
        $value
    ): AddValuesPurchaseAttributesResponse {
        Assert::notEmpty($token);
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::notEmpty($attrAlias);

        $addValuesPurchaseAttributes = new AddValuesPurchaseAttributes(self::getClient());
        $addValuesPurchaseAttributesRequest = new AddValuesPurchaseAttributesRequest(
            $storeDepartmentId,
            $attrAlias,
            $value
        );

        return ($addValuesPurchaseAttributes)($addValuesPurchaseAttributesRequest, $token);
    }

    /**
     * @throws ApiErrorException
     * @throws Throwable
     */
    public static function purchaseAttributesDelete(
        string $token,
        int $storeDepartmentId,
        string $alias
    ): DeletePurchaseAttributesResponse {
        Assert::notEmpty($token);
        Assert::greaterThan($storeDepartmentId, 0);

        $deletePurchaseAttributes = new DeletePurchaseAttributes(self::getClient());
        $deletePurchaseAttributesRequest = new DeletePurchaseAttributesRequest($storeDepartmentId, $alias);

        return ($deletePurchaseAttributes)($deletePurchaseAttributesRequest, $token);
    }

    /**
     * @throws ApiErrorException
     * @throws Throwable
     */
    public static function purchaseAttributesDeleteValues(
        string $token,
        int $storeDepartmentId,
        int $id
    ): DeleteValuesPurchaseAttributesResponse {
        Assert::notEmpty($token);
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::positiveInteger($id);

        $deleteValuesPurchaseAttributes = new DeleteValuesPurchaseAttributes(self::getClient());
        $deleteValuesPurchaseAttributesRequest = new DeleteValuesPurchaseAttributesRequest(
            $storeDepartmentId,
            $id
        );

        return ($deleteValuesPurchaseAttributes)($deleteValuesPurchaseAttributesRequest, $token);
    }

    /**
     * @throws ApiErrorException
     * @throws Throwable
     */
    public static function purchaseAttributesList(
        string $token,
        int $storeDepartmentId
    ): ListPurchaseAttributesResponse {
        Assert::notEmpty($token);
        Assert::greaterThan($storeDepartmentId, 0);

        $listPurchaseAttributes = new ListPurchaseAttributes(self::getClient());
        $listPurchaseAttributesRequest = new ListPurchaseAttributesRequest($storeDepartmentId);

        return ($listPurchaseAttributes)($listPurchaseAttributesRequest, $token);
    }

    /**
     * @throws ApiErrorException
     * @throws Throwable
     */
    public static function purchaseAttributesListValues(
        string $token,
        int $storeDepartmentId,
        string $attrAlias,
        int $page = 1
    ): ListValuesPurchaseAttributesResponse {
        Assert::notEmpty($token);
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::notEmpty($attrAlias);
        Assert::positiveInteger($page);

        $listValuesPurchaseAttributes = new ListValuesPurchaseAttributes(self::getClient());
        $listValuesPurchaseAttributesRequest = new ListValuesPurchaseAttributesRequest(
            $storeDepartmentId,
            $attrAlias,
            $page
        );

        return ($listValuesPurchaseAttributes)($listValuesPurchaseAttributesRequest, $token);
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
