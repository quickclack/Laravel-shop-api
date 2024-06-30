<?php

use Illuminate\Support\Facades\App;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->boolean('on_home_page')
                ->default(false);

            $table->integer('sorting')
                ->default(10);
        });
    }

    public function down(): void
    {
        if (App::isLocal()) {
            Schema::table('brands', function (Blueprint $table) {
                $table->dropColumn('on_home_page');
                $table->dropColumn('sorting');
            });
        }
    }
};
