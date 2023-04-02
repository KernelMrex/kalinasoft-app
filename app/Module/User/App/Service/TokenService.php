<?php
declare(strict_types=1);

namespace App\Module\User\App\Service;

use App\Module\User\App\Factory\TokenFactoryInterface;
use App\Module\User\App\Model\Token;
use App\Module\User\App\Repository\TokenRepositoryInterface;

final class TokenService
{
    private TokenRepositoryInterface $tokenRepository;
    private TokenFactoryInterface $tokenFactory;

    public function __construct(
        TokenRepositoryInterface $tokenRepository,
        TokenFactoryInterface $tokenFactory
    ) {
        $this->tokenRepository = $tokenRepository;
        $this->tokenFactory = $tokenFactory;
    }

    public function createTokenForUser(string $userId): Token
    {
        $token = $this->tokenFactory->generateToken($userId);
        $this->tokenRepository->save($token);
        return $token;
    }

    public function findUserIdByTokenValue(string $tokenValue): ?string
    {
        $token = $this->tokenRepository->findByValue($tokenValue);
        return $token?->getUserId();
    }
}
