<?php
declare(strict_types=1);

namespace App\Module\User\Infrastructure\Repository;

use App\Models\User as EloquentUser;
use App\Module\User\App\Model\User as ModuleUser;
use App\Module\User\App\Repository\Exception\UserHasNotUniqueEmailOrPhoneException;
use App\Module\User\App\Repository\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    public function findByID(string $id): ?ModuleUser
    {
        // TODO: Implement findByID() method.
    }

    public function save(ModuleUser $user): void
    {
        /** @var EloquentUser|null $eloquentModel */
        $eloquentModel = null;
        if ($user->getId() !== null)
        {
            $eloquentModel = EloquentUser::find((int) $user->getId());
        }
        else
        {
            $duplicatedUser = EloquentUser::where('email', '=', $user->getEmail())->orWhere('phone', '=', $user->getPhone())->first();
            if ($duplicatedUser !== null)
            {
                throw new UserHasNotUniqueEmailOrPhoneException();
            }

            $eloquentModel = new EloquentUser();
        }

        $eloquentModel->id = $user->getId() ?? $eloquentModel->id;
        $eloquentModel->first_name = $user->getFirstName();
        $eloquentModel->middle_name = $user->getMiddleName();
        $eloquentModel->last_name = $user->getLastName();
        $eloquentModel->phone = $user->getPhone();
        $eloquentModel->email = $user->getEmail();
        $eloquentModel->password = $user->getPassword();

        $eloquentModel->save();
    }
}
