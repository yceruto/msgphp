<?php

declare(strict_types=1);

namespace MsgPhp\Domain\Infra\Uuid;

use MsgPhp\Domain\DomainIdInterface;
use Ramsey\Uuid\Uuid;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
class DomainId implements DomainIdInterface
{
    private $uuid;

    public function __construct(string $uuid = null)
    {
        $this->uuid = null === $uuid ? Uuid::uuid4() : Uuid::fromString($uuid);
    }

    final public function equals(DomainIdInterface $id): bool
    {
        return $id instanceof self && get_class($id) === get_class($this) ? $this->uuid->equals($id->uuid) : false;
    }

    final public function toString(): string
    {
        return $this->uuid->toString();
    }

    final public function __toString(): string
    {
        return $this->uuid->toString();
    }

    final public function serialize(): string
    {
        return serialize($this->uuid);
    }

    final public function unserialize(/*string */$serialized): void
    {
        $this->uuid = unserialize($serialized);
    }

    final public function jsonSerialize()
    {
        return $this->uuid->jsonSerialize();
    }
}
