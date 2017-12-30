<?php

declare(strict_types=1);

namespace MsgPhp\User\Entity\Credential;

use MsgPhp\User\Credential\{CredentialInterface, EmailCredentialTrait};

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
final class Email implements CredentialInterface
{
    use EmailCredentialTrait;

    public function __construct(string $email)
    {
        $this->email = $email;
    }
}
