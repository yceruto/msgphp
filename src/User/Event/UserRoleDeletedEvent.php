<?php

declare(strict_types=1);

namespace MsgPhp\User\Event;

use MsgPhp\User\Entity\UserRole;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
final class UserRoleDeletedEvent
{
    public $userRole;

    public function __construct(UserRole $userRole)
    {
        $this->userRole = $userRole;
    }
}
