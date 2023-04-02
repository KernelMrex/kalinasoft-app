<?php
declare(strict_types=1);

namespace App\Module\User\Api;

use App\Module\User\Api\Data\UserLoginData;
use App\Module\User\Api\Data\UserRegistrationData;
use App\Module\User\Api\Exception\ApiException;
use App\Module\User\App\Exception\AppException;
use App\Module\User\App\Service\TokenService;
use App\Module\User\App\Service\UserService;

final class Api implements ApiInterface
{
    private UserService $userService;
    private TokenService $tokenService;

    public function __construct(
        UserService $userService,
        TokenService $tokenService
    ) {
        $this->userService = $userService;
        $this->tokenService = $tokenService;
    }

    public function registerUser(UserRegistrationData $registrationData): void
    {
        try
        {
            $this->userService->registerUser($registrationData);
        }
        catch (AppException $exception)
        {
            throw new ApiException('internal error', 0, $exception);
        }
    }

    public function loginUser(UserLoginData $loginData): ?string
    {
        try
        {
            return $this->userService->loginUser($loginData);
        }
        catch (AppException $exception)
        {
            throw new ApiException('internal error', 0, $exception);
        }
    }

    public function getUserIdByToken(string $token): ?string
    {
        return $this->tokenService->findUserIdByTokenValue($token);
    }
}
