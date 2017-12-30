<?php

declare(strict_types=1);

namespace MsgPhp\User\Entity\Credential;

use MsgPhp\User\Credential\{CredentialInterface, NicknameCredentialTrait};
use MsgPhp\User\Password\{PasswordInterface, PasswordTrait};

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
final class NicknamePassword implements CredentialInterface, PasswordInterface
{
    use NicknameCredentialTrait;
    use PasswordTrait;

    public function __construct(string $nickname, string $password)
    {
        $this->nickname = $nickname;
        $this->password = $password;
    }
}
