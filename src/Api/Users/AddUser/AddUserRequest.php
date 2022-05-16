<?php

namespace Studio15\SailPlay\SDK\Api\Users\AddUser;

use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Webmozart\Assert\Assert;

/**
 * @see https://ru.sailplay.dev/reference/users-add
 */
final class AddUserRequest
{
    public const MALE = 1;
    public const FEMALE = 2;
    public const OTHER = 3;

    public const SEX = [
        self::MALE,
        self::FEMALE,
        self::OTHER,
    ];

    /**
     * Идентификатор департамента
     *
     * @var int
     */
    private $storeDepartmentId;

    /**
     * Номер телефона или другой идентификатор
     * Пример: 79991234567
     *
     * @var ?string
     */
    private $userPhone;

    /**
     * Электронный адрес
     *
     * @var ?string
     */
    private $email;

    /**
     * Внутренний идентификатор
     *
     * @var ?string
     */
    private $originUserId;

    /**
     * Имя
     *
     * @var ?string
     */
    private $firstName;

    /**
     * Отчество
     *
     * @var ?string
     */
    private $middleName;

    /**
     * Фамилия
     *
     * @var ?string
     */
    private $lastName;

    /**
     * Дата рождения
     *
     * @var ?\DateTimeImmutable
     *
     * @Serializer\Context({ DateTimeNormalizer::FORMAT_KEY = "Y-m-d" })
     */
    private $birthDate;

    /**
     * Пол: 1 - Мужской, 2 - Женский, 3 – Другой
     *
     * @var ?int
     */
    private $sex;

    /**
     * Дата регистрации
     *
     * @var ?\DateTimeImmutable
     *
     * @Serializer\Context({ DateTimeNormalizer::FORMAT_KEY = "Y-m-d" })
     */
    private $registerDate;

    /**
     * Внутренний идентификатор реферала
     *
     * @var ?string
     */
    private $referrerOriginUserId;

    /**
     * Номер телефона реферала
     *
     * @var ?string
     */
    private $referrerPhone;

    /**
     * Электронный адрес реферала
     *
     * @var ?string
     */
    private $referrerEmail;

    /**
     * Реферальный промокод реферала
     *
     * @var ?string
     */
    private $referrerPromocode;

    public function __construct(
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
    ) {
        Assert::greaterThan($storeDepartmentId, 0);
        Assert::nullOrRegex($userPhone, '/^7\d{10}$/');
        Assert::nullOrNotEmpty($originUserId);
        Assert::nullOrEmail($email);
        Assert::notEmpty($userPhone . $originUserId);
        Assert::nullOrInArray($sex, self::SEX);
        Assert::nullOrRegex($referrerPhone, '/^7\d{10}$/');
        Assert::nullOrEmail($referrerEmail);

        $this->storeDepartmentId = $storeDepartmentId;
        $this->userPhone = $userPhone;
        $this->email = $email;
        $this->originUserId = $originUserId;
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->sex = $sex;
        $this->registerDate = $registerDate;
        $this->referrerOriginUserId = $referrerOriginUserId;
        $this->referrerPhone = $referrerPhone;
        $this->referrerEmail = $referrerEmail;
        $this->referrerPromocode = $referrerPromocode;
    }

    public function getStoreDepartmentId(): int
    {
        return $this->storeDepartmentId;
    }

    public function getUserPhone(): ?string
    {
        return $this->userPhone;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getOriginUserId(): ?string
    {
        return $this->originUserId;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getBirthDate(): ?\DateTimeImmutable
    {
        return $this->birthDate;
    }

    public function getSex(): ?int
    {
        return $this->sex;
    }

    public function getRegisterDate(): ?\DateTimeImmutable
    {
        return $this->registerDate;
    }

    public function getReferrerOriginUserId(): ?string
    {
        return $this->referrerOriginUserId;
    }

    public function getReferrerPhone(): ?string
    {
        return $this->referrerPhone;
    }

    public function getReferrerEmail(): ?string
    {
        return $this->referrerEmail;
    }

    public function getReferrerPromocode(): ?string
    {
        return $this->referrerPromocode;
    }
}
