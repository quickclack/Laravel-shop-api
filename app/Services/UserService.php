<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Collection;
use App\Repositories\Contracts\UserRepository;

final class UserService
{
    public function __construct(
        private readonly UserRepository $repository,
    ) {
    }

    public function findById(int $id): ?User
    {
        return $this->repository
            ->findById($id);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->repository
            ->findByEmail($email);
    }

    public function getAll(): Collection
    {
        return $this->repository
            ->getAll();
    }

    public function create(array $data): User
    {
        return $this->repository
            ->create($data);
    }
}
