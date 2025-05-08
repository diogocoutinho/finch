<?php

namespace App\Application\User;

use App\Domain\Entities\User;
use App\Domain\Repository\UserRepositoryInterface;

class CreateUser
{
    public function __construct(private UserRepositoryInterface $repository) {}

    public function execute(string $name, string $email, ?string $cpf = null, string $role = 'executor'): void
    {
        $user = new User($name, $email, $cpf, $role);
        $this->repository->save($user);
    }
}
