<?php

declare(strict_types=1);

namespace App\Models\Catalog;

use App\Models\Product\Product;
use App\Support\Traits\Models\Slugable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int id
 * @property string title
 * @property string slug
 * @property string thumbnail
 * @property int on_home_page
 * @property int sorting
 */
class Brand extends Model
{
    use Slugable;
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'on_home_page',
        'sorting',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
