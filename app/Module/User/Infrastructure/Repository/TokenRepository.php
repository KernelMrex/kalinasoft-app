<?php
declare(strict_types=1);

namespace App\Module\User\Infrastructure\Repository;

use App\Models\Token as EloquentToken;
use App\Module\User\App\Model\Token as ModuleToken;
use App\Module\User\App\Repository\TokenRepositoryInterface;

class TokenRepository implements TokenRepositoryInterface
{
    public function findByValue(string $value): ?ModuleToken
    {
        // TODO
        return null;
    }

    public function save(ModuleToken $token): void
    {
        if ($token->getId() !== null)
        {
            $eloquentModel = EloquentToken::find((int) $token->getId());
        }
        else
        {
            $eloquentModel = new EloquentToken();
        }

        $eloquentModel->id = $token->getId() ?? $eloquentModel->id ?? null;
        $eloquentModel->value = $token->getValue();
        $eloquentModel->user_id = $token->getUserId();

        $eloquentModel->save();
    }
}
