<?php

declare(strict_types=1);

namespace MsgPhp\User\Entity\Credential;

use MsgPhp\User\Credential\{CredentialInterface, NicknameCredentialTrait};

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
final class Nickname implements CredentialInterface
{
    use NicknameCredentialTrait;

    public function __construct(string $nickname)
    {
        $this->nickname = $nickname;
    }
}
