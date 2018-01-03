<?php

declare(strict_types=1);

namespace MsgPhp\User\Password;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
interface PasswordEncoderInterface
{
    public function encode(string $plainPassword): string;

    public function isValid(string $encodedPassword, string $plainPassword): bool;
}
