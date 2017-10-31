<?php


namespace FreeElephants\RestAuth\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="FreeElephants\RestAuth\Entity\UserRepository")
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
    private $password;

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
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
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