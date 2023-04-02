<?php
declare(strict_types=1);

namespace App\Module\User\App\Data;

interface UserRegistrationDataInterface
{
    public function getFirstName(): string;

    public function getMiddleName(): string;

    public function getLastName(): string;

    public function getEmail(): string;

    public function getPhone(): string;

    public function getPassword(): string;
}
