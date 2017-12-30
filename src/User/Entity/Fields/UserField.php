<?php

declare(strict_types=1);

namespace MsgPhp\User\Entity\Fields;

use MsgPhp\User\Entity\User;
use MsgPhp\User\UserIdInterface;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
trait UserField
{
    private $user;

    public function getUser(): User
    {
        return $this->user;
    }

    final public function getUserId(): UserIdInterface
    {
        return $this->getUser()->getId();
    }
}
