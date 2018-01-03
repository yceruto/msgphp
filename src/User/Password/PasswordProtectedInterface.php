<?php

declare(strict_types=1);

namespace MsgPhp\User\Password;

/**
 * Represents a *hashed* password value.
 *
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
interface PasswordProtectedInterface
{
    public function getPassword(): string;

    public function getPasswordAlgorithm(): PasswordAlgorithm;
}
