<?php

declare(strict_types=1);

namespace MsgPhp\User\Entity\Fields;

use MsgPhp\User\Credential\CredentialInterface;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
trait CredentialField
{
    private $credential;

    public function getCredential(): CredentialInterface
    {
        return $this->credential;
    }
}
