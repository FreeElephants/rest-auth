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

    public function __construct(string $guid, array $inputData)
    {
        $this->guid = $guid;
        $this->login = $inputData['login'];
        $this->email = $inputData['email'];
    }

    /**
     * @return string
     */
    public function getGuid(): string
    {
        return $this->guid;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
}