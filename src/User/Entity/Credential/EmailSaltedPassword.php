<?php

declare(strict_types=1);

namespace MsgPhp\User\Entity\Credential;

use MsgPhp\User\Credential\{CredentialInterface, EmailCredentialTrait};
use MsgPhp\User\Password\{SaltedPasswordInterface, SaltedPasswordTrait};

/**
 * Note one should prefer a saltless password implementation by default, i.e. {@see EmailPassword}. The salted
 * password implementation is usually used in e.g. a legacy system.
 *
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
final class EmailSaltedPassword implements CredentialInterface, SaltedPasswordInterface
{
    use EmailCredentialTrait;
    use SaltedPasswordTrait;

    public function __construct(string $email, string $password, string $passwordSalt)
    {
        $this->email = $email;
        $this->password = $password;
        $this->passwordSalt = $passwordSalt;
    }
}
