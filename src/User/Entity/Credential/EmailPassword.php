<?php

declare(strict_types=1);

namespace MsgPhp\User\Entity\Credential;

use MsgPhp\User\Credential\{CredentialInterface, EmailCredentialTrait};
use MsgPhp\User\Password\{PasswordAlgorithm, PasswordProtectedInterface, PasswordProtectedTrait};

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
final class EmailPassword implements CredentialInterface, PasswordProtectedInterface
{
    use EmailCredentialTrait;
    use PasswordProtectedTrait;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
        $this->passwordAlgorithm = PasswordAlgorithm::create();
    }
}
