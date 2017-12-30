<?php

declare(strict_types=1);

namespace MsgPhp\User\Credential;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
trait NicknameCredentialTrait
{
    private $nickname;

    final public function getNickname(): string
    {
        return $this->nickname;
    }

    final public function getUsername(): string
    {
        return $this->nickname;
    }
}
