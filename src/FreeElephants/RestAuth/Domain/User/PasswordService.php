<?php


namespace FreeElephants\RestAuth\Domain\User;

class PasswordService
{

    const DEFAULT_ALGO = PASSWORD_BCRYPT;
    const DEFAULT_OPTIONS = [
        'cost' => 10,
    ];
    /**
     * @var int
     */
    private $algo;
    /**
     * @var array
     */
    private $options;

    public function __construct(int $algo = self::DEFAULT_ALGO, array $options = self::DEFAULT_OPTIONS)
    {

        $this->algo = $algo;
        $this->options = $options;
    }

    public function hash(string $password): string
    {
        return password_hash($password, $this->algo, $this->options);
    }

    public function verify(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }

}