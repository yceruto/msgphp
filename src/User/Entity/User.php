<?php

declare(strict_types=1);

namespace MsgPhp\User\Entity;

use MsgPhp\Domain\Entity\Fields\{CreatedAtField, LastUpdatedAtField};
use MsgPhp\User\Credential\CredentialAwareInterface;
use MsgPhp\User\Entity\Credential\EmailPassword;
use MsgPhp\User\Entity\Fields\CredentialField;
use MsgPhp\User\UserIdInterface;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
class User implements CredentialAwareInterface
{
    use CredentialField; // @todo + Features/EmailCredential etc.
    use CreatedAtField; // @todo remove
    use LastUpdatedAtField; // @todo remove

    private $id;
    private $email;
    private $password;
    private $passwordResetToken;
    private $passwordRequestedAt;

    public function __construct(UserIdInterface $id, string $email, string $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->createdAt = new \DateTimeImmutable();
        $this->lastUpdatedAt = new \DateTimeImmutable();
        $this->credential = new EmailPassword($this->email, $this->password); // @todo constructor arg + default Anonymous
    }

    public function getId(): UserIdInterface
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getPasswordResetToken(): ?string
    {
        return $this->passwordResetToken;
    }

    public function getPasswordRequestedAt(): ?\DateTimeInterface
    {
        return $this->passwordRequestedAt;
    }

    public function changeEmail(string $email): void
    {
        $this->email = $email;
        $this->lastUpdatedAt = new \DateTimeImmutable();
    }

    public function changePassword(string $password): void
    {
        $this->password = $password;
        $this->passwordResetToken = null;
        $this->passwordRequestedAt = null;
        $this->lastUpdatedAt = new \DateTimeImmutable();
    }

    public function requestPassword(): void
    {
        $this->passwordResetToken = bin2hex(random_bytes(32));
        $this->passwordRequestedAt = new \DateTimeImmutable();
        $this->lastUpdatedAt = new \DateTimeImmutable();
    }
}
