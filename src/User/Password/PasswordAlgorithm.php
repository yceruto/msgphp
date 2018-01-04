<?php

declare(strict_types=1);

namespace MsgPhp\User\Password;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
final class PasswordAlgorithm
{
    private const DEFAULT_LEGACY_TYPE = 'sha512';
    private const DEFAULT_LEGACY_SALT_FORMAT = '%s{%s}';

    /** @var int|string */
    public $type;

    /** @var bool */
    public $legacy;

    /** @var array|null */
    public $options;

    /** @var string|null */
    public $salt;

    /** @var string|null */
    public $saltFormat;

    /**
     * @see https://secure.php.net/manual/en/function.password-hash.php
     */
    public static function create(int $type = \PASSWORD_DEFAULT, array $options = []): self
    {
        $instance = new self($type);
        $instance->options = $options;

        return $instance;
    }

    /**
     * @see https://secure.php.net/manual/en/function.hash.php
     */
    public static function createLegacy(string $type = self::DEFAULT_LEGACY_TYPE): self
    {
        return new self($type, true);
    }

    public static function createLegacyWithSalt(string $salt, string $type = self::DEFAULT_LEGACY_TYPE): self
    {
        $instance = self::createLegacy($type);
        $instance->salt = $salt;
        $instance->saltFormat = self::DEFAULT_LEGACY_SALT_FORMAT;

        return $instance;
    }

    public static function createLegacyWithFormattedSalt(string $salt, string $format, string $type = self::DEFAULT_LEGACY_TYPE): self
    {
        $instance = self::createLegacyWithSalt($salt, $type);
        $instance->saltFormat = $format;

        return $instance;
    }

    private function __construct($type, bool $legacy = false)
    {
        $this->type = $type;
        $this->legacy = $legacy;
    }
}
