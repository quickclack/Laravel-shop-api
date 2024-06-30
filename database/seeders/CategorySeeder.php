<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalog\Category;
use Database\Factories\Product\ProductFactory;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $properties = PropertyFactory::new()
            ->count(10)
            ->create();

        OptionFactory::new()->count(2)->create();

        $optionsValue = OptionValueFactory::new()
            ->count(10)
            ->create();

        Category::factory(10)
            ->has(ProductFactory::new()
                ->count(rand(5,15))
                ->hasAttached($optionsValue)
                ->hasAttached($properties, fn() => ['value' => ucfirst(fake()->word())])
            )->create();
    }
}
