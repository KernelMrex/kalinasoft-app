<?php
declare(strict_types=1);

namespace App\Module\User\Infrastructure\Factory;

use App\Module\User\App\Factory\TokenFactoryInterface;
use App\Module\User\App\Model\Token;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RandomTokenFactory implements TokenFactoryInterface
{
    public function generateToken(string $userId): Token
    {
        return (new Token())
            ->setUserId($userId)
            ->setValue(Hash::make(Str::random()));
    }
}
