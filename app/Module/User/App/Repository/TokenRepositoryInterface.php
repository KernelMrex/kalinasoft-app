<?php
declare(strict_types=1);

namespace App\Module\User\App\Repository;

use App\Module\User\App\Model\Token;

interface TokenRepositoryInterface
{
    public function findByValue(string $value): ?Token;

    public function save(Token $token): void;
}
