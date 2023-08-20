<?php

declare(strict_types=1);

namespace App\Support\Traits\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

trait Slugable
{
    protected static function bootHasSlug(): void
    {
        static::creating(
            fn (Model $model) => $model->slug = $model->slug ?? Str::slug($model->{self::slugFrom()})
        );
    }

    protected static function slugFrom(): string
    {
        return 'title';
    }
}
