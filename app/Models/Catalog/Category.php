<?php

namespace App\Models\Catalog;

use App\Support\Traits\Models\Slugable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int id
 * @property string title
 * @property string slug
 * @property int on_home_page
 * @property int sorting
 */
class Category extends Model
{
    use Slugable;
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'on_home_page',
        'sorting',
    ];
}
