<?php

namespace App\Infra\Persistence;

use App\Domain\Entities\User;
use App\Domain\Repository\UserRepositoryInterface;
use App\Config\Database;
use PDO;

class PdoUserRepository implements UserRepositoryInterface
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = Database::connect();
    }

    public function save(User $user): void
    {
        $sql = 'INSERT INTO users (name, email, cpf, role) VALUES (:name, :email, :cpf, :role)';
        $stmt = $this->connection->prepare($sql);

        $stmt->execute([
            ':name' => $user->name,
            ':email' => $user->email,
            ':cpf' => $user->cpf,
            ':role' => $user->role,
        ]);
    }

    public function findById(int $id): ?User
    {
        $sql = 'SELECT * FROM users WHERE id = :id LIMIT 1';
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();

        return $row ? $this->hydrate($row) : null;
    }

    public function findByEmail(string $email): ?User
    {
        $sql = 'SELECT * FROM users WHERE email = :email LIMIT 1';
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':email' => $email]);
        $row = $stmt->fetch();

        return $row ? $this->hydrate($row) : null;
    }

    private function hydrate(array $data): User
    {
        return new User(
            name: $data['name'],
            email: $data['email'],
            cpf: $data['cpf'],
            role: $data['role'],
            id: (int)$data['id']
        );
    }
}
