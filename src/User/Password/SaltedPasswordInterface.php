<?php

declare(strict_types=1);

namespace MsgPhp\User\Password;

/**
 * Represents a *hashed* and salted password value.
 *
 * Note one should prefer a saltless password implementation by default, i.e. {@see PasswordInterface}. The salted
 * password implementation is usually used in e.g. a legacy system.
 *
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
interface SaltedPasswordInterface extends PasswordInterface
{
    public function getPasswordSalt(): string;
}
