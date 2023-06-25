<?php

declare(strict_types=1);

namespace App\Enums;

enum RoleEnum: string
{
    case Administrator = 'Administrator';
    case Manager = 'Manager';

    public function getName(): string
    {
        return match ($this) {
            self::Administrator => 'Администратор',
            self::Manager => 'Менеджер',
        };
    }
}
