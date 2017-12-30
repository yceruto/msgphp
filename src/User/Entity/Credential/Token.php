<?php

declare(strict_types=1);

namespace MsgPhp\User\Entity\Credential;

use MsgPhp\User\Credential\{CredentialInterface, TokenCredentialTrait};

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
final class Token implements CredentialInterface
{
    use TokenCredentialTrait;

    public function __construct(string $token)
    {
        $this->token = $token;
    }
}
