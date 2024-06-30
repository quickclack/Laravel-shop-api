<?php

declare(strict_types=1);

namespace App\Models\Product;

use App\Models\Catalog\Brand;
use App\Models\Catalog\Category;
use App\Support\Traits\Models\Slugable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use Slugable;
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
        'price',
        'brand_id',
        'on_home_page',
        'sorting',
        'quantity',
        'text',
        'json_properties'
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
