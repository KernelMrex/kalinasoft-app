<?php
declare(strict_types=1);

namespace App\Module\User\App\Factory;

use App\Module\User\App\Model\Token;

interface TokenFactoryInterface
{
    public function generateToken(string $userId): Token;
}
