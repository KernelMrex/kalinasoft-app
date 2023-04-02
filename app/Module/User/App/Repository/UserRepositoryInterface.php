<?php
declare(strict_types=1);

namespace App\Module\User\App\Repository;

use App\Module\User\App\Model\User;

interface UserRepositoryInterface
{
    public function findByID(string $id): ?User;

    public function save(User $user): void;
}
