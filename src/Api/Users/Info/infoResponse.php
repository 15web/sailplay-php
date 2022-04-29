<?php

namespace Studio15\SailPlay\SDK\Api\Users\Info;

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
     * @var int
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
     * @var string
     */
    private $phone;

    /**
     * Имя
     *
     * @var string
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
     * @var string
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

    public function __construct(
        string $status,
        int $id,
        ?string $email,
        string $phone,
        string $firstName,
        ?string $middleName,
        string $lastName,
        ?string $birthDate,
        ?string $sex,
        ?string $originUserId,
        ?string $avatar
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
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    public function getLastName(): string
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
}
