<?php

declare(strict_types=1);

namespace MsgPhp\User\Infra\Security;

use MsgPhp\User\Password\PasswordAlgorithm;
use MsgPhp\User\Password\PasswordHashingInterface;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 *
 * @todo remove in favor for Password\PasswordEncoder
 */
final class NativeBcryptPasswordEncoder implements PasswordHashingInterface
{
    private $cost;

    public function __construct(int $cost = 13)
    {
        $this->cost = $cost;
    }

    public function hash(string $plainPassword, PasswordAlgorithm $algorithm = null): string
    {
        return password_hash($plainPassword, \PASSWORD_BCRYPT, ['cost' => $this->cost]);
    }

    public function isValid(string $encodedPassword, string $plainPassword, PasswordAlgorithm $algorithm = null): bool
    {
        return password_verify($plainPassword, $encodedPassword);
    }
}
