<?php
declare(strict_types=1);

namespace App\Module\User\Infrastructure\Repository;

use App\Module\User\App\Model\Token;
use App\Module\User\App\Repository\TokenRepositoryInterface;

class TokenRepository implements TokenRepositoryInterface
{
    public function findByValue(string $value): ?Token
    {
        // TODO
        return null;
    }

    public function save(Token $token): void
    {
        // TODO
    }
}
