<?php

declare(strict_types=1);

namespace MsgPhp\User\Password;

/**
 * Represents a *hashed* password value.
 *
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
interface PasswordInterface
{
    public function getPassword(): string;
}
