<?php

declare(strict_types=1);

namespace MsgPhp\User\Entity\Credential;

use MsgPhp\User\Credential\CredentialInterface;
use MsgPhp\User\Entity\Credential\Features\EmailAsUsername;
use MsgPhp\User\Password\{PasswordProtectedInterface, PasswordProtectedTrait};

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
final class EmailPassword implements CredentialInterface, PasswordProtectedInterface
{
    use EmailAsUsername;
    use PasswordProtectedTrait;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function withEmail(string $email): self
    {
        return new self($email, $this->password);
    }

    public function withPassword(string $password): self
    {
        return new self($this->email, $password);
    }
}
