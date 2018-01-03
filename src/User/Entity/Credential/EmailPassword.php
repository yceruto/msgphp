<?php

declare(strict_types=1);

namespace MsgPhp\User\Entity\Credential;

use MsgPhp\User\Credential\{CredentialInterface, EmailCredentialTrait};
use MsgPhp\User\Password\{PasswordAlgorithm, PasswordInterface, PasswordTrait};

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
final class EmailPassword implements CredentialInterface, PasswordInterface
{
    use EmailCredentialTrait;
    use PasswordTrait;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
        $this->passwordAlgorithm = PasswordAlgorithm::create();
    }
}
