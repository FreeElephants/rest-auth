<?php

namespace FreeElephants\RestAuth\Domain\User;

class UserRegistrationDto
{

    /**
     * @var string
     */
    private $guid;
    /**
     * @var string
     */
    private $login;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $password;

    public function __construct(string $guid, array $inputData)
    {
        $this->guid = $guid;
        $this->login = $inputData['login'];
        $this->email = $inputData['email'];
        $this->password = $inputData['password'];
    }

    public function getGuid(): string
    {
        return $this->guid;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}