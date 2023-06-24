<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface UserRepository
{
    public function findById(int $id): ?User;

    public function findByEmail(string $email): User;

    public function getAll(): Collection;

    public function create(array $data): User|Model;

    public function update(array $data, int $id): int;

    public function delete(int $id): bool;
}
