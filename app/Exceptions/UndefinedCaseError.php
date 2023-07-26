<?php

declare(strict_types=1);

namespace App\Exceptions;

use Error;

final class UndefinedCaseError extends Error
{
    public function __construct(string $enum, string $case)
    {
        parent::__construct("Undefined constant $enum::$case");
    }
}
