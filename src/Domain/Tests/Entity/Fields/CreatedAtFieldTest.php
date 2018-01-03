<?php

declare(strict_types=1);

namespace MsgPhp\Domain\Tests\Entity\Fields;

use MsgPhp\Domain\Entity\Fields\CreatedAtField;
use PHPUnit\Framework\TestCase;

final class CreatedAtFieldTest extends TestCase
{
    public function testField(): void
    {
        $object = $this->getObject($value = new \DateTime());

        $this->assertSame($value, $object->getCreatedAt());
    }

    private function getObject($value)
    {
        return new class($value) {
            use CreatedAtField;

            public function __construct($value)
            {
                $this->createdAt = $value;
            }
        };
    }
}
