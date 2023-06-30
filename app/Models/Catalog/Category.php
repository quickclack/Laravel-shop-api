<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int id
 * @property string title
 * @property string slug
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
    ];
}
