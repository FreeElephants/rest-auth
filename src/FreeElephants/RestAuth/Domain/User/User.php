<?php


namespace FreeElephants\RestAuth\Domain\User;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="UserRepository")
 */
class User
{

    /**
     * @ORM\Column(type="guid")
     * @ORM\Id()
     * @var string
     */
    private $guid;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     *
     * @var string
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @var string
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $passwordHash;

    /**
     * @param string $guid
     */
    public function setGuid(string $guid)
    {
        $this->guid = $guid;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @param string $passwordHash
     */
    public function setPasswordHash(string $passwordHash)
    {
        $this->passwordHash = $passwordHash;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    public function getGuid(): string
    {
        return $this->guid;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}