<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\UserRepository as Contract;

final class UserRepository implements Contract
{
    public function __construct(
      private User $model
    ) {
    }

    public function findById(int $id): ?User
    {
        return $this->model
            ->findOrFail($id);
    }

    public function findByEmail(string $email): User
    {
        return $this->model
            ->where('email', $email)
            ->first();
    }

    public function getAll(): Collection
    {
        return $this->model
            ->newQuery()
            ->get();
    }

    public function create(array $data): User|Model
    {
        return $this->model
            ->newQuery()
            ->create($data);
    }

    public function update(array $data, int $id): int
    {
        return $this->model
            ->newQuery()
            ->where('id', $id)
            ->update($data);
    }

    public function delete(int $id): bool
    {
        return $this->model
            ->newQuery()
            ->where('id', $id)
            ->delete();
    }
}
