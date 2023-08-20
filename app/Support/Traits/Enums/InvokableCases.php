<?php

declare(strict_types=1);

namespace App\Support\Traits\Enums;

use BackedEnum;
use App\Exceptions\UndefinedCaseError;

trait InvokableCases
{
    public function __invoke(): string|int
    {
        return $this instanceof BackedEnum
            ? $this->value
            : $this->name;
    }

    public static function __callStatic(string $name, array $args): string|int
    {
        $cases = static::cases();

        foreach ($cases as $case) {
            if ($case->name === $name) {
                return $case instanceof BackedEnum
                    ? $case->value
                    : $case->name;
            }
        }

        throw new UndefinedCaseError(static::class, $name);
    }
}
