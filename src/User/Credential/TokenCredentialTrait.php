<?php

declare(strict_types=1);

namespace MsgPhp\User\Credential;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
trait TokenCredentialTrait
{
    private $token;

    final public function getToken(): string
    {
        return $this->token;
    }

    final public function getUsername(): string
    {
        return $this->token;
    }
}
