<?php

declare(strict_types=1);

namespace MsgPhp\User\Password;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
trait PasswordTrait
{
    private $password;
    private $passwordAlgorithm;

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getPasswordAlgorithm(): PasswordAlgorithm
    {
        return $this->passwordAlgorithm;
    }
}
