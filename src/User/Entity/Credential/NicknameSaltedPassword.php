<?php

declare(strict_types=1);

namespace MsgPhp\User\Entity\Credential;

use MsgPhp\User\Credential\{CredentialInterface, NicknameCredentialTrait};
use MsgPhp\User\Password\{PasswordProtectedInterface, PasswordWithSaltProtectedTrait};

/**
 * Note one should prefer a saltless password implementation by default, i.e. {@see NicknamePassword}. The salted
 * password implementation is usually used in e.g. a legacy system.
 *
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
final class NicknameSaltedPassword implements CredentialInterface, PasswordProtectedInterface
{
    use NicknameCredentialTrait;
    use PasswordWithSaltProtectedTrait;

    public function __construct(string $nickname, string $password, string $passwordSalt)
    {
        $this->nickname = $nickname;
        $this->password = $password;
        $this->passwordSalt = $passwordSalt;
    }
}
