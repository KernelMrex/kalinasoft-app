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
        $eloquentModel = EloquentToken::where('value', $value)->first();

        if (!$eloquentModel)
        {
            return null;
        }

        return (new ModuleToken())
            ->setId((string) $eloquentModel->id)
            ->setValue($eloquentModel->value)
            ->setUserId((string) $eloquentModel->user_id);
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
