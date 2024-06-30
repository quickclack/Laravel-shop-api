<?php

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
        Schema::table('categories', function (Blueprint $table) {
            $table->boolean('on_home_page')
                ->default(false);

            $table->integer('sorting')
                ->default(10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (App::isLocal()) {
            Schema::table('categories', function (Blueprint $table) {
                $table->dropColumn('on_home_page');
                $table->dropColumn('sorting');
            });
        }
    }
};
