<?php
declare(strict_types=1);

namespace App\Module\User\App\Query;

interface UserQueryServiceInterface
{
    /**
     * Returns id of user with these credentials
     */
    public function findByEmailOrPhoneAndPassword(?string $email, ?string $phone, string $password): ?string;
}
