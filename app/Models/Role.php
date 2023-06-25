<?php

namespace App\Models;

use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int id
 * @property string name
 */
class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'name' => RoleEnum::class,
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
