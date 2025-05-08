<?php

namespace App\Domain\Entities;

class User
{
    public function __construct(
        public string $name,
        public string $email,
        public ?string $cpf = null,
        public string $role = 'executor',
        public ?int $id = null
    ) {}

    public function isManager(): bool
    {
        return $this->role === 'manager';
    }

    public function isExecutor(): bool
    {
        return $this->role === 'executor';
    }
}
