<?php


namespace FreeElephants\RestAuth\Domain\User;


use Doctrine\ORM\EntityManagerInterface;
use FreeElephants\RestAuth\Domain\User\Exception\UserDataValidationError;
use FreeElephants\RestAuth\Entity\User;
use FreeElephants\RestAuth\Entity\UserRepository;

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

    public function __construct(EntityManagerInterface $entityManager, UserRepository $userRepository)
    {
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
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
            $errors[] = sprintf('User with given login \'%s\' already exists. ', $userWithEmail->getLogin());
        }

        if ($errors) {
            throw new UserDataValidationError($errors);
        }

        $user = new User();
        $user->setGuid($userRegistrationDto->getGuid());
        $user->setLogin($userRegistrationDto->getLogin());
        $user->setEmail($userRegistrationDto->getEmail());
        $this->entityManager->persist($user);

        return $user;
    }

}