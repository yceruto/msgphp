<?php

declare(strict_types=1);

namespace MsgPhp\User\Password;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
final class PasswordSalt
{
    public $token;
    public $format;
    public $iterations;

    public function __construct(string $token, string $format = '%s{%s}', int $iterations = 5000)
    {
        $this->token = $token;
        $this->format = $format;
        $this->iterations = $iterations;
    }
}
