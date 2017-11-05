<?php

namespace FreeElephants\RestAuth\Domain\User;

use Doctrine\ORM\EntityManagerInterface;
use FreeElephants\RestAuth\Domain\User\Exception\UserDataValidationError;

class RegistrationService
{

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var PasswordService
     */
    private $passwordService;

    public function __construct(EntityManagerInterface $entityManager, UserRepository $userRepository, PasswordService $passwordService)
    {
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
        $this->passwordService = $passwordService;
    }

    public function registerUser(UserRegistrationDto $userRegistrationDto): User
    {
        $userWithGuid = $this->userRepository->find($userRegistrationDto->getGuid());
        $userWithEmail = $this->userRepository->findOneBy(['email' => $userRegistrationDto->getEmail()]);
        $userWithLogin = $this->userRepository->findOneBy(['login' => $userRegistrationDto->getLogin()]);

        $errors = [];
        if ($userWithGuid) {
            $errors[] = sprintf('User with given guid \'%s\' already exists. ', $userWithGuid->getGuid());
        }
        if ($userWithEmail) {
            $errors[] = sprintf('User with given email \'%s\' already exists. ', $userWithEmail->getEmail());
        }
        if ($userWithLogin) {
            $errors[] = sprintf('User with given login \'%s\' already exists. ', $userWithLogin->getLogin());
        }

        if ($errors) {
            throw new UserDataValidationError($errors);
        }

        $user = new User();
        $user->setGuid($userRegistrationDto->getGuid());
        $user->setLogin($userRegistrationDto->getLogin());
        $user->setEmail($userRegistrationDto->getEmail());
        $user->setPasswordHash($this->passwordService->hash($userRegistrationDto->getPassword()));
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        return $user;
    }

}