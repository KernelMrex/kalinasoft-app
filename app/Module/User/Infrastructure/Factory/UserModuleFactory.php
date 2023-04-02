<?php
declare(strict_types=1);

namespace App\Module\User\Infrastructure\Factory;

use App\Module\User\Api\Api;
use App\Module\User\Api\ApiInterface;
use App\Module\User\App\Service\TokenService;
use App\Module\User\App\Service\UserService;
use App\Module\User\Infrastructure\Query\UserQueryService;
use App\Module\User\Infrastructure\Repository\TokenRepository;
use App\Module\User\Infrastructure\Repository\UserRepository;

class UserModuleFactory
{
    public static function getInstance(): ApiInterface
    {
        $userRepository = new UserRepository();
        $tokenRepository = new TokenRepository();

        $tokenFactory = new RandomTokenFactory();

        $userQueryService = new UserQueryService();

        $tokenService = new TokenService($tokenRepository, $tokenFactory);
        $userService = new UserService($userRepository, $userQueryService, $tokenService);

        return new Api($userService, $tokenService);
    }
}
