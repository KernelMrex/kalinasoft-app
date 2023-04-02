<?php
declare(strict_types=1);

namespace App\Module\User\Api\Data;


use App\Module\User\App\Data\UserRegistrationDataInterface;

final class UserRegistrationData implements UserRegistrationDataInterface
{
    private string $firstName;
    private string $middleName;
    private string $lastName;
    private string $email;
    private string $phone;
    private string $password;

    public function __construct(
        string $firstName,
        string $middleName,
        string $lastName,
        string $email,
        string $phone,
        string $password
    ) {
        $this->middleName = $middleName;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
    }

    public function getMiddleName(): string
    {
        return $this->middleName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
