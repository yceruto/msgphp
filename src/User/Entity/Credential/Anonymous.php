<?php

declare(strict_types=1);

namespace MsgPhp\User\Entity\Credential;

use MsgPhp\User\Credential\CredentialInterface;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
final class Anonymous implements CredentialInterface
{
    public function getUsername(): string
    {
        throw new \LogicException('An anonymous credential has no username.');
    }
}
