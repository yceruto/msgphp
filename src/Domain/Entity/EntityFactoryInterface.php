<?php

declare(strict_types=1);

namespace MsgPhp\Domain\Entity;

use MsgPhp\Domain\{DomainIdInterface, DomainObjectFactoryInterface};

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
interface EntityFactoryInterface extends DomainObjectFactoryInterface
{
    public function identify(string $class, $id): DomainIdInterface;

    public function nextIdentity(string $class): DomainIdInterface;
}
