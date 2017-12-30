<?php

declare(strict_types=1);

namespace MsgPhp\User\Credential;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
trait EmailCredentialTrait
{
    private $email;

    final public function getEmail(): string
    {
        return $this->email;
    }

    final public function getUsername(): string
    {
        return $this->email;
    }
}
