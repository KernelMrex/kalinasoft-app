<?php
declare(strict_types=1);

namespace App\Module\User\Infrastructure\Query;

use App\Module\User\App\Query\UserQueryServiceInterface;

class UserQueryService implements UserQueryServiceInterface
{
    public function findByEmailOrPhoneAndPassword(?string $email, ?string $phone, string $passwordHash): ?string
    {
        // TODO
        return null;
    }
}
