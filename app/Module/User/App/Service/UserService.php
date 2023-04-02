<?php
declare(strict_types=1);

namespace App\Module\User\App\Service;

use App\Module\User\App\Data\UserRegistrationDataInterface;
use App\Module\User\App\Model\User;
use App\Module\User\App\Repository\UserRepositoryInterface;

final class UserService
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
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
}
