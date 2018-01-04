<?php

declare(strict_types=1);

namespace MsgPhp\User\Tests\Password;

use MsgPhp\User\Password\PasswordHashing;
use PHPUnit\Framework\TestCase;

final class PasswordHashingTest extends TestCase
{
    public function testDefaultHash(): void
    {
        $hashing = new PasswordHashing();

        $this->assertNotSame('password', $hashing->hash('password'));
        $this->assertNotSame($hashing->hash('other-password'), $hashing->hash('password'));
        $this->assertNotSame($hashing->hash('password'), $hashing->hash('password'));
    }

    public function testDefaultIsValid(): void
    {
        $hashing = new PasswordHashing();

        $this->assertTrue($hashing->isValid($hashing->hash('password'), 'password'));
        $this->assertFalse($hashing->isValid($hashing->hash('other-password'), 'password'));
        $this->assertFalse($hashing->isValid($hashing->hash('password'), $hashing->hash('password')));
        $this->assertFalse($hashing->isValid('password', $hashing->hash('password')));
        $this->assertFalse($hashing->isValid('password', 'password'));
    }
}
