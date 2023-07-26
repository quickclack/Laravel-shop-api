<?php

declare(strict_types=1);

namespace App\DTO\User;

use Illuminate\Contracts\Support\Arrayable;

final class CreateDTO implements Arrayable
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    ) {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
