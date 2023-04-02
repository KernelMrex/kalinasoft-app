<?php
declare(strict_types=1);

namespace App\Module\User\App\Service;

use App\Module\User\App\Data\UserLoginDataInterface;
use App\Module\User\App\Data\UserRegistrationDataInterface;
use App\Module\User\App\Model\User;
use App\Module\User\App\Query\UserQueryServiceInterface;
use App\Module\User\App\Repository\UserRepositoryInterface;

final class UserService
{
    private UserRepositoryInterface $userRepository;
    private UserQueryServiceInterface $userQueryService;
    private TokenService $tokenService;

    public function __construct(
        UserRepositoryInterface $userRepository,
        UserQueryServiceInterface $userQueryService,
        TokenService $tokenService
    ) {
        $this->userRepository = $userRepository;
        $this->userQueryService = $userQueryService;
        $this->tokenService = $tokenService;
    }

    public function registerUser(UserRegistrationDataInterface $registrationData): void
    {
        $user = (new User())
            ->setFirstName($registrationData->getFirstName())
            ->setMiddleName($registrationData->getMiddleName())
            ->setLastName($registrationData->getLastName())
            ->setEmail($registrationData->getEmail())
            ->setPhone($registrationData->getPhone())
            ->setPassword($registrationData->getPassword());

        $this->userRepository->save($user);
    }

    public function loginUser(UserLoginDataInterface $loginData): ?string
    {
        $userId = $this->userQueryService->findByEmailOrPhoneAndPassword(
            $loginData->getEmail(),
            $loginData->getPhone(),
            $loginData->getHashedPassword()
        );
        if (!$userId)
        {
            return null;
        }

        $token = $this->tokenService->createTokenForUser($userId);
        return $token->getValue();
    }
}
