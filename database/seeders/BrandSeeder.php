<?php

namespace Database\Seeders;

use App\Models\Catalog\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        Brand::factory(6)
            ->create();
    }
}
