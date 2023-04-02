<?php
declare(strict_types=1);

namespace App\Module\User\Api;

use App\Module\User\Api\Data\UserLoginData;
use App\Module\User\Api\Data\UserRegistrationData;
use App\Module\User\Api\Exception\ApiException;

interface ApiInterface
{
    /** @throws ApiException */
    public function registerUser(UserRegistrationData $registrationData): void;

    public function loginUser(UserLoginData $loginData): ?string;

    /**
     * Returns userId or null if not authorized
     */
    public function getUserIdByToken(string $token): ?string;
}
