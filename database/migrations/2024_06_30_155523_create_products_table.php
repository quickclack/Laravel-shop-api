<?php

use App\Models\Catalog\Brand;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')
                ->unique();
            $table->string('thumbnail')
                ->nullable();
            $table->unsignedInteger('price')
                ->default(0);
            $table->unsignedInteger('quantity')
                ->default(0);

            $table->foreignIdFor(Brand::class)
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (App::isLocal()) {
            Schema::dropIfExists('products');
        }
    }
};
