<?php

declare(strict_types=1);

namespace MsgPhp\User\Entity\Credential;

use MsgPhp\User\Credential\{CredentialInterface, NicknameCredentialTrait};
use MsgPhp\User\Password\{PasswordAlgorithm, PasswordProtectedInterface, PasswordProtectedTrait};

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
final class NicknamePassword implements CredentialInterface, PasswordProtectedInterface
{
    use NicknameCredentialTrait;
    use PasswordProtectedTrait;

    public function __construct(string $nickname, string $password)
    {
        $this->nickname = $nickname;
        $this->password = $password;
        $this->passwordAlgorithm = PasswordAlgorithm::create();
    }
}
