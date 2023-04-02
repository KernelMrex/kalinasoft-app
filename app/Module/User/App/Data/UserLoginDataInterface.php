<?php
declare(strict_types=1);

namespace App\Module\User\App\Data;

interface UserLoginDataInterface
{
    public function getEmail(): ?string;

    public function getPhone(): ?string;

    public function getHashedPassword(): string;
}
