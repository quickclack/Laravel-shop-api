<?php

use App\Enums\RoleEnum;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->enum('name', array_column(RoleEnum::cases(), 'value'))
                ->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        if (App::isLocal()) {
            Schema::dropIfExists('roles');
        }
    }
};
