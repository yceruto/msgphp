<?php

declare(strict_types=1);

namespace MsgPhp\Domain\Entity\Fields;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
trait CreatedAtField
{
    /** @var \DateTimeInterface */
    private $createdAt;

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }
}
