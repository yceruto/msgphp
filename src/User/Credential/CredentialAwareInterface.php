<?php

declare(strict_types=1);

namespace MsgPhp\User\Credential;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
interface CredentialAwareInterface
{
    public function getCredential(): CredentialInterface;
}
