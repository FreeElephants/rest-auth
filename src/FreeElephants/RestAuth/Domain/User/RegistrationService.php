<?php


namespace FreeElephants\RestAuth\Domain\User;


use Doctrine\ORM\EntityManagerInterface;
use FreeElephants\RestAuth\Domain\Exception\GuidAlreadyExistsException;
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
        $criteria = [
            '$or' => [
                ['guid' => $userRegistrationDto->getGuid()],
                ['login' => $userRegistrationDto->getLogin()],
                ['email' => $userRegistrationDto->getEmail()],
            ]
        ];
        if($user = $this->userRepository->findOneBy($criteria)) {
            switch (true) {
                case $userRegistrationDto->getGuid() === $user->getGuid():
                    throw new GuidAlreadyExistsException();
                case $userRegistrationDto->getEmail() === $user->getEmail():
                    throw new EmailAlreadyExistsException();
                case $userRegistrationDto->getLogin() === $user->getLogin():
                    throw new LoginAlreadyExistsExeption();

            }

        } else {
            $user = new User();
            $user->setLogin();
        }
    }
}