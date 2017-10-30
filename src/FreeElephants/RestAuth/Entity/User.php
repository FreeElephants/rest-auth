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
}