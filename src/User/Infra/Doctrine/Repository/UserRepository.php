<?php

declare(strict_types=1);

namespace MsgPhp\User\Infra\Doctrine\Repository;

use MsgPhp\Domain\DomainCollectionInterface;
use MsgPhp\Domain\Infra\Doctrine\DomainEntityRepositoryTrait;
use MsgPhp\User\Entity\User;
use MsgPhp\User\Repository\UserRepositoryInterface;
use MsgPhp\User\UserIdInterface;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
final class UserRepository implements UserRepositoryInterface
{
    use DomainEntityRepositoryTrait;

    private $alias = 'user';
    private $idFields = ['id'];

    /**
     * @return DomainCollectionInterface|User[]
     */
    public function findAll(int $offset = null, int $limit = null): DomainCollectionInterface
    {
        return $this->createResultSet($this->createQueryBuilder($offset, $limit)->getQuery());
    }

    public function find(UserIdInterface $id): User
    {
        return $this->doFind($id);
    }

    public function findByEmail(string $email): User
    {
        return $this->doFindByFields(['email' => $email]);
    }

    public function exists(UserIdInterface $id): bool
    {
        return $this->doExists($id);
    }

    public function save(User $user): void
    {
        $this->doSave($user);
    }

    public function delete(User $user): void
    {
        $this->doDelete($user);
    }
}
