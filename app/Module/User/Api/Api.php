<?php
declare(strict_types=1);

namespace App\Module\User\Api;

use App\Module\User\Api\Data\UserRegistrationData;
use App\Module\User\Api\Exception\ApiException;
use App\Module\User\App\Exception\AppException;
use App\Module\User\App\Service\UserService;

final class Api implements ApiInterface
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
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
}
