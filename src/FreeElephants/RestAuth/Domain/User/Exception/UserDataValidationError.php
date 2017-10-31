<?php


namespace FreeElephants\RestAuth\Domain\User\Exception;


use FreeElephants\RestAuth\Exception\DomainException;

class UserDataValidationError extends DomainException
{

    /**
     * @var iterable
     */
    private $errors;

    public function __construct(iterable $errors)
    {
        $this->errors = $errors;
        $message = join(". \n", $errors);
        parent::__construct($message, 0, null);
    }

    public function getErrors(): iterable
    {
        return $this->errors;
    }
}