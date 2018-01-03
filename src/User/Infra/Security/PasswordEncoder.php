<?php

declare(strict_types=1);

namespace MsgPhp\User\Infra\Security;

use MsgPhp\User\Password\{PasswordAlgorithm, PasswordEncoderInterface};
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface as BasePasswordEncoder;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
final class PasswordEncoder implements PasswordEncoderInterface
{
    private $encoder;
    private $salt;

    public function __construct(BasePasswordEncoder $encoder, string $salt = null)
    {
        $this->encoder = $encoder;
        $this->salt = $salt ?? bin2hex(random_bytes(16));
    }

    public function encode(string $plainPassword, PasswordAlgorithm $algorithm = null): string
    {
        // @fixme $algorithm arg
        return $this->encoder->encodePassword($plainPassword, $this->salt);
    }

    public function isValid(string $encodedPassword, string $plainPassword, PasswordAlgorithm $algorithm = null): bool
    {
        // @fixme $algorithm arg
        return $this->encoder->isPasswordValid($encodedPassword, $plainPassword, $this->salt);
    }
}
