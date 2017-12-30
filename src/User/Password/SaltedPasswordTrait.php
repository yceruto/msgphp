<?php

declare(strict_types=1);

namespace MsgPhp\User\Password;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
trait SaltedPasswordTrait
{
    use PasswordTrait;

    private $passwordSalt;

    public function getPasswordSalt(): string
    {
        return $this->passwordSalt;
    }
}
