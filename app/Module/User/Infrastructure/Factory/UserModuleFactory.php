<?php
declare(strict_types=1);

namespace App\Module\User\Infrastructure\Factory;

use App\Module\User\Api\Api;
use App\Module\User\Api\ApiInterface;
use App\Module\User\App\Service\UserService;
use App\Module\User\Infrastructure\Repository\UserRepository;

class UserModuleFactory
{
    public static function getInstance(): ApiInterface
    {
        $userRepository = new UserRepository();

        $userService = new UserService($userRepository);

        return new Api($userService);
    }
}
