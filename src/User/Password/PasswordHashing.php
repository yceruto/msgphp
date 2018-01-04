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
                if (2 !== ($c = substr_count($algorithm->salt->format, '%s'))) {
                    throw new \LogicException(sprintf('Password salt format should have exactly 2 value placeholders (%d found).', $c));
                }

                $plainPassword = sprintf($algorithm->salt->format, $plainPassword, $algorithm->salt->token);
            }

            $hash = hash($algorithm->type, $plainPassword, true);

            for ($i = 1; $i < $algorithm->salt->iterations; ++$i) {
                $hash = hash($algorithm->type, $hash.$plainPassword, true);
            }

            return $algorithm->encodeBase64 ? base64_encode($hash) : bin2hex($hash);
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
