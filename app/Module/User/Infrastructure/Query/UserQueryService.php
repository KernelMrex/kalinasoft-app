<?php
declare(strict_types=1);

namespace App\Module\User\Infrastructure\Query;

use App\Module\User\App\Query\UserQueryServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserQueryService implements UserQueryServiceInterface
{
    public function findByEmailOrPhoneAndPassword(?string $email, ?string $phone, string $password): ?string
    {
        $row = DB::table('user')
            ->addSelect('id')
            ->addSelect('password')
            ->whereRaw('email = ? or phone = ?', [$email, $phone])
            ->first();

        if (!$row)
        {
            return null;
        }

        return Hash::check($password, $row->password) ? (string) $row->id : null;
    }
}
