<?php

declare(strict_types=1);

namespace Database\Factories\Product;

use App\Models\Catalog\Brand;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => ucfirst($this->faker->words(2, true)),
            'thumbnail' => $this->faker->fixturesImage('products', 'images/products'),
            'price' => $this->faker->numberBetween(10000, 1000000),
            'quantity' => $this->faker->numberBetween(1, 60),
            'brand_id' => Brand::query()
                ->inRandomOrder()
                ->value('id'),
            'on_home_page' => $this->faker->boolean(),
            'sorting' => $this->faker->numberBetween(1, 999),
            'text' => $this->faker->realText(),
        ];
    }
}
