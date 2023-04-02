<?php
declare(strict_types=1);

namespace App\Module\User\Api\Data;

use App\Module\User\App\Data\UserLoginDataInterface;

class UserLoginData implements UserLoginDataInterface
{
    private ?string $email;
    private ?string $phone;
    private string $hashedPassword;

    public function __construct(?string $email, ?string $phone, string $hashedPassword)
    {
        $this->email = $email;
        $this->phone = $phone;
        $this->hashedPassword = $hashedPassword;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getHashedPassword(): string
    {
        return $this->hashedPassword;
    }
}
