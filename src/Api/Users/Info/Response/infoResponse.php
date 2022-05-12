<?php

declare(strict_types=1);

namespace Studio15\SailPlay\SDK\Api\Users\Info\Response;

/**
 * @see https://ru.sailplay.dev/reference/users-info
 */
final class infoResponse
{
    /**
     * Статус ответа
     *
     * @var string
     */
    private $status;

    /**
     * Идентификатор
     *
     * @var ?int
     */
    private $id;

    /**
     * Электронный адрес
     *
     * @var ?string
     */
    private $email;

    /**
     * Номер телефона
     *
     * @var ?string
     */
    private $phone;

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
     * @var ?string
     */
    private $birthDate;

    /**
     * Пол: 1 - Мужской, 2 - Женский, 3 – Другой
     *
     * @var ?string
     */
    private $sex;

    /**
     * Внутренний идентификатор
     *
     * @var ?string
     */
    private $originUserId;

    /**
     * Ссылка на аватар
     *
     * @var ?string
     */
    private $avatar;

    /**
     * Информация о баллах
     *
     * @var ?Points
     */
    private $points;

    /**
     * Хэш аутентификации
     *
     * @var ?string
     */
    private $authHash;

    /**
     * Реферальный промокод
     *
     * @var ?string
     */
    private $referralPromocode;

    /**
     * Подписки
     *
     * @var string[]
     */
    private $subscriptions;

    /**
     * История
     *
     * @var History[]
     */
    private $history;

    /**
     * @param string[] $subscriptions
     * @param History[] $history
     */
    public function __construct(
        string $status,
        ?int $id,
        ?string $email,
        ?string $phone,
        ?string $firstName,
        ?string $middleName,
        ?string $lastName,
        ?string $birthDate,
        ?string $sex,
        ?string $originUserId,
        ?string $avatar,
        ?Points $points,
        ?string $authHash,
        ?string $referralPromocode,
        array $subscriptions = [],
        array $history = []
    ) {
        $this->status = $status;
        $this->id = $id;
        $this->email = $email;
        $this->phone = $phone;
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->sex = $sex;
        $this->originUserId = $originUserId;
        $this->avatar = $avatar;
        $this->points = $points;
        $this->authHash = $authHash;
        $this->referralPromocode = $referralPromocode;
        $this->subscriptions = $subscriptions;
        $this->history = $history;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
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

    public function getBirthDate(): ?string
    {
        return $this->birthDate;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function getOriginUserId(): ?string
    {
        return $this->originUserId;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function getPoints(): ?Points
    {
        return $this->points;
    }

    public function getAuthHash(): ?string
    {
        return $this->authHash;
    }

    public function getReferralPromocode(): ?string
    {
        return $this->referralPromocode;
    }

    /**
     * @return string[]
     */
    public function getSubscriptions(): array
    {
        return $this->subscriptions;
    }

    /**
     * @return History[]
     */
    public function getHistory(): array
    {
        return $this->history;
    }
}
