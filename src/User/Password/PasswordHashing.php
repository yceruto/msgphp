<?php

declare(strict_types=1);

namespace MsgPhp\User\Password;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
final class PasswordHashing implements PasswordHashingInterface
{
    private $defaultAlgorithm;
    private $deprecateLegacyApi;

    public function __construct(PasswordAlgorithm $defaultAlgorithm = null, $deprecateLegacyApi = true)
    {
        $this->defaultAlgorithm = $defaultAlgorithm ?? PasswordAlgorithm::create();
        $this->deprecateLegacyApi = $deprecateLegacyApi;
    }

    public function hash(string $plainPassword, PasswordAlgorithm $algorithm = null): string
    {
        $algorithm = $algorithm ?? $this->defaultAlgorithm;

        if ($algorithm->legacy) {
            if ($this->deprecateLegacyApi) {
                @trigger_error('Using PHP\'s legacy password API is deprecated and should be avoided.');
            }

            if (null !== $algorithm->salt) {
                $plainPassword = sprintf($algorithm->saltFormat, $plainPassword, $algorithm->salt);
            }

            return hash($algorithm->type, $plainPassword);
        }

        return password_hash($plainPassword, $algorithm->type, $algorithm->options);
    }

    public function isValid(string $encodedPassword, string $plainPassword, PasswordAlgorithm $algorithm = null): bool
    {
        $algorithm = $algorithm ?? $this->defaultAlgorithm;

        return $algorithm->legacy
            ? hash_equals($encodedPassword, $this->hash($plainPassword, $algorithm))
            : password_verify($plainPassword, $encodedPassword);
    }
}
